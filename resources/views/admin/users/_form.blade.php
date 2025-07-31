@csrf

<div class="mb-3">
    <label for="name">Tên</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
</div>

<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
</div>

<div class="mb-3">
    <label for="password">Mật khẩu</label>
    <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
    <label for="password_confirmation">Xác nhận mật khẩu</label>
    <input type="password" name="password_confirmation" class="form-control">
</div>

<div class="mb-3">
    <label for="roles">Phân quyền</label>
    <select name="roles[]" class="form-control" multiple>
        @foreach($roles as $role)
            <option value="{{ $role->name }}" 
                @if(isset($user) && $user->hasRole($role->name)) selected @endif>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Lưu</button>

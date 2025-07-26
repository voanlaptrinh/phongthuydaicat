@extends('welcome')
@section('content')
    <section class="experts-section section">
        <div class="container">
            <div class="gthiu-main-heading-wrapper">
                <div class="heading-decorator dich-vu-phongthuy"></div>
                <div class="bx-gthiu">
                    <h2 class="section-title-main-heading">Dịch vụ phong thủy</h2>
                    <img src="{{asset('/assets/images/icontitlecamketleft.svg')}}" alt="Họa tiết trang trí"
                        class="dichvu-icontitle-camketleft">
                    <img src="{{asset('/assets/images/icontitlecamketright.svg')}}" alt="Họa tiết trang trí"
                        class="dichvu-icontitle-camketright">
                </div>


            </div>
        </div>


        <div class=" mt-5 container-fixx">
            <div class="row g-4">
                <!-- Cột Bootstrap chỉ để chia layout, không chứa background -->
                @foreach ($dichvu as $dichvuitem)
                      <div class="col-lg-4 col-sm-6 col-12">
                    <!-- Khối này chứa background và toàn bộ nội dung của bạn -->
                    <div class="backdichvuphongthuy">
                        <div class="p-3">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <img src="{{ asset($dichvuitem->images ?? 'assets/images/anh_carddichvu.svg') }}" alt="" class="img-fluid">
                                <div class="title-dichvuphongthuy">
                                   {{$dichvuitem->title ?? ''}}
                                </div>
                                <div class="content-dichvuphongthuy2">
                                   {{$dichvuitem->description ?? ''}}
                                </div>
                                <div class="box-xemthem-dichvuphongthuy">
                                     <a href="{{route('dichvusdetail', $dichvuitem->id)}}" class="read-more-link mt-2" style="color: white">
                                        Xem thêm
                                        <span class="arrow-icon" style="background: white"><img
                                                src="/assets/images/nexticon.svg" alt="" class="img-fluid"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
           


            </div>
        </div>
    </section>
    @include('home.lienhe')
@endsection

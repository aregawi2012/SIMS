@extends('includes.master_layout');

@section('content')
    <div class="container">
        <div class="rows">
            <div class="row">

                <div class="col-md-12 col-sm-8 col-lg-12">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-6">
                            <img src="../../../dist/img/logo.png" class="img-circle img-responsive"
                                 height="50px"
                                 width="50px"
                            >
                        </div>
                    </div>
                    <h3 class="text-center text-bold text-success">ኮሌጅ ሳይንስን ቴክኖሎጂን ፔንቴክ</h3>
                    <h4 class="text-center">Pentech College of Science Technology</h4>
                    <hr color="gray">
                    <p><span class="fa fa-map-marker"></span>&nbsp;Ethiopia , Tigray , Mekelle &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fa fa-phone-square">&nbsp; 0334343453/03453453424</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fa fa-envelope">&nbsp; 1632</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fa fa-mail-forward">&nbsp; info@pentech.com</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fa fa-globe">&nbsp; www.pentechcollege.com</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;
                        &nbsp;
                        <span>TIN No. &nbsp; 00453453453453</span>
                    </p>
                    <hr color="gray" style="border: 2px solid gray">


                </div>
            </div>
            <br>
            @if(count($slip_info))
                @foreach($slip_info->all() as $info)
                    <div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <h3 class="text-center text-success text-bold">የገቢ ደረስኝ</h3>
                                <h5 class="text-center">RECEIPT VOUCHER</h5>
                                <hr>
                            </div>
                            <div class="col-md-3 " style="border: 1px solid gray">

                                <span class="text-bold">ቀን &nbsp; </span>
                                <p >
                                    <span class="text-bold" style="margin-top:-30px;">&nbsp;Date: </span>
                                    <span > <span class="text-sm" >{{$info->created_at}}</span>
                                </span>
                                </p>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <span class="text-bold">ስም &nbsp; </span>
                                <p>
                                    <span class="text-bold" style="margin-top:-30px;">Name : </span>
                                    <span class="text-sm">{{$info->student_name}}
                                </span>
                                <hr style="margin-left: 45px; margin-top: -10px; border: 1px dashed gray;"/>

                                </p>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <span class="text-bold">ምክንያት &nbsp; </span>
                                <p>
                                    <span class="text-bold" style="margin-top:-30px;">reason : </span>
                                    <span class="text-sm">{{$info->payment_name}}
                                </span>
                                <hr style="margin-left: 45px; margin-top: -10px; border: 1px dashed gray;"/>

                                </p>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">

                                <span class="text-bold">የገንዝብ መጠን በፊደል&nbsp; </span>
                                <p>
                                    <span class="text-bold" style="margin-top:-30px;">Amount in Words : </span>
                                    <span class="text-sm"> </span>
                                <hr style="margin-left: 130px; margin-top: -10px;border: 1px dashed gray;"/>
                                <hr style="border: 1px dashed gray;"/>

                                </p>
                            </div>
                            <div class="col-md-5 col-sm-5 col-lg-5" style="border: 1px solid gray">

                                <span class="text-bold">ብር &nbsp; </span>
                                <p >
                                    <span class="text-bold" style="margin-top:-30px;">&nbsp;Birr: </span>
                                    <span > <span class="text-sm" >{{$info->payment_amount
                               }}&nbsp;
                                       ETB</span>
                                </span>
                                </p>
                            </div>

                        </div>
                        <hr color="gray" style="border: 2px solid gray">

                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-bold">ክፍያ የተፈፀመበት መንገድ /Mode of Payment</p>
                                <input type="checkbox" class="" name="payment_type"  id="payment_type">
                                &nbsp; በጥሬ ገንዘብ/Cash <br>
                                <input type="checkbox" class="" name="payment_type" id="payment_type">
                                &nbsp; ብቼክ/Check <br>
                                <input type="checkbox" class="" name="payment_type" id="payment_type">
                                &nbsp; በባንክ/Bank Ref
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td>ተ.ቁ/No.</td>
                                        <td>የክፍያ ስም/Payment Name</td>
                                        <td>ብር/Birr</td>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$info->payment_name}}</td>
                                        <td>{{$info->payment_amount}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr style="color:gray;">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">

                                <span class="text-bold">የተቀባይ ስምና ፊርማ &nbsp; </span>
                                <p>
                                    <span class="text-bold" style="margin-top:-30px;">Receiver Name : </span>

                                </p>
                                <hr style="margin-left: 110px; margin-top: -10px; border: 1px dashed gray;"/>

                            </div>
                            <div class="col-md-8 col-sm-8 col-lg-8">
                                <p class="text-sm">ዋናው ቅጂ ለከፋጂ ፣ ሁለተኛ ቅጂ ለሂሳብ ክፍል ፣ ሦስተኛው ለ-- </p>
                                <p class="text-sm">Orginal to the payer , second copy to accounts ,third copy ...</p>
                            </div>

                        </div>

                        @endforeach
                        @else
                            <p class="text-danger"> No Recept info Found . <a href="/make_payment/index">Go Back</a></p>
                        @endif
                    </div>
        </div>
    </div>
    </div>

    <style type="text/css">
        .container {
            background-color: white;
            height:auto;
            width: 97%;
        }

    </style>
@endsection
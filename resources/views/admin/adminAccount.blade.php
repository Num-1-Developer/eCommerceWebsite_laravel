@extends('admin.layout.master')
<!-- Page wrapper  -->
<!-- ============================================================== -->
@section('content')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="title_page">Admin Account page</h4>
            </div>
           
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Account Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    
    @if(session()->has('message'))
    @if(session()->get('message')=='0')
        <div class="alert alert-danger">
            <p>আপনার দেওয়া তথ্য বিদ্যমান আছে</p>

        </div>
    @elseif(session()->get('message')=='4')
        <div class="alert alert-success">
            <p>সফলভাবে ডিলেট হয়েছে</p>

        </div>
    @elseif(session()->get('message')=='1')
        <div class="alert alert-success">
            <p>সফলভাবে যোগ করা হয়েছে</p>

        </div>
    @elseif(session()->get('message')=='5')
        <div class="alert alert-success">
            <p>সফলভাবে আপডেট হয়েছে</p>

        </div>
    @endif
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">


        <!-- ============================================================== -->
        <!-- Add Police Station -->
        <div class="col-12  w-75 m-auto">
            <div class="card">
                <div class="card-body">
                    {{-- ============================================================================================================
                    =======================================  Insert Form  ======================================================
                    ============================================================================================================ --}}
                    <form action="{{route('admin.AdminInsert')}}"  method="POST" id="insert_form" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        {{-- {{route('admin/insert')}} --}}
                      @csrf

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">নাম</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='name' type="text" placeholder="নাম" class="form-control form-control-line">
                            </div>
                        </div>

                     
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Email</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='email' type="email" placeholder="Insert Your Email" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label for="role" class="col-sm-12" style="width: 25%;">Role</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name="role" id="role" class="form-control form-control-line">
                                    <option value="">Select Role</option>
                                    <option value="admin">Make Admin</option>
                                    <option value="Editor">Make Editor</option>
                                    <option value="viewer">Make Viewer</option>
                                </select>
                            </div>
                           
                        </div>

                      

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Password</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='password' type="password" placeholder="Insert Password" class="form-control form-control-line">
                            </div>
                        </div>
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button class="btn btn-success text-white">Create Admin</button> 
                            </div>
                        </div>
                    </form>



                     {{-- ============================================================================================================
                    =======================================  Edit Form  ======================================================
                    ============================================================================================================ --}}


                    <form action="{{route('admin.AdminUpdate')}}"  method="POST" id="edit_form" class="form-horizontal form-material mx-2" enctype="multipart/form-data" style="display: none">
                        {{-- {{route('admin/update')}} --}}
                      @csrf
                      @method('PUT');

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">নাম</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input id="input1" name='name' type="text" placeholder="নাম" class="form-control form-control-line">
                            </div>
                        </div>

                     
                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Email</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input id="input2" name='email' type="email" placeholder="Insert Your Email" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group d-flex">
                            <label for="role" class="col-sm-12" style="width: 25%;">Role</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <select name="role" id="role" class="form-control form-control-line">
                                    <option value="">Select Role</option>
                                    <option value="admin">Make Admin</option>
                                    <option value="Editor">Make Editor</option>
                                    <option value="viewer">Make Viewer</option>
                                </select>
                            </div>
                        </div>

                      

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;">Password</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input id="input4" name='password' type="password" placeholder="Insert Password"  class="form-control form-control-line">
                            </div>
                        </div>

                        <input id="id" type="hidden" name='id' type="number" class="form-control form-control-line">
                       
                        <div class="form-group d-flex">
                            <div class="col-sm-12" style="width: 25%;"></div>
                            <div class="col-sm-12" style="width: 75%;">
                                <button class="btn btn-success text-white">Edit</button> 
                                <button type="button" id="back" href='back_insert' class="btn btn-success text-white">Back</button>
                            </div>
                        </div>


                </div>
            </div>
        </div>





{{-- =======================================================================================================
==============================       Show show table        ===========================================
==================================================================================================== --}}
        <div class="row">
            <!-- column -->
            <div class="col-12  m-auto">
                <div class="card">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">SL.</th>
                                    
                                    <th class="border-top-0 text-center"> Name</th>
                                    <th class="border-top-0 text-center"> Email</th>
                                    <th class="border-top-0 text-center"> Role</th>
                                    <th class="border-top-0 text-center">অপারেশন</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($db_data as $data)
                                <tr>
                                    <td>{{$loop->index+1}}
                                    </td>
                                    <td >{{$data->name}}</td>
                                    <td >{{$data->email}}</td>
                                    <td >{{$data->role}}</td>
                                    <td class="td_css">

                                        <a class="edit_btn" pid='{{$data->id}}' class="btn btn-info">
                                        <i class="bi bi-pen"></i>
                                        </a>

                                     <form  method="POST" action="/admin/delete/adminAccountModel/{{$data->id}}"  class="spacing">
                                        @csrf
                                        @method('delete')
                                            <button  id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')">
                                             <i class="bi bi-trash"></i> 
                                            </button>
                                     </form>
                                   
                                    </td>
                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- =======================================================================================================
==============================     End Show show table        ===========================================
==================================================================================================== --}}







    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
   {{-- <footer> --}}
        <footer class="footer text-center">
           <div class="footer_login">
            All Rights Reserved by <br>
            <a href="http://www.nazmuljewel.com/" target="_blank" style="color:blue; font-size:23px; text-decoration:none;">নাজমুল আলম ভূইয়া জুয়েল </a> <br>
            <span class="footer_span">বিজ্ঞান ও প্রযুক্তি বিষয়ক সম্পাদক</span> <br>
             <a href="https://www.albd-dcn.org/" target="_blank" style="color:green; font-size:23px; text-decoration:red;">ঢাকা মহানগর উত্তর আওয়ামী লীগ</a> 
           </div>
        </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

    
@endsection

@section('javaScript')
<script>

        $('.edit_btn').each(function()
        {

            $(this).on('click',function()
            {
                var id = $(this).attr('pid');
                var tr = $(this).closest("tr");
                var length = $(tr).find("td").length;

                
                // console.log($(tr).find("td").length)
                // console.log($(tr).find("td:eq(0)").text());
                // $("#c_type_name").val(tdProx);
                $('#insert_form').hide();
                $('#edit_form').show();
                // $("#input""").val($(tr).find("td:eq("+i+")").text());
                
                for(let i=1;i<length-1;i++)
                {
                        // console.log($(tr).find("td:eq("+i+ ")").text())
                     $("#input"+i+"").val($(tr).find("td:eq("+i+")").text());
                }
                
                $('#id').val(id);
               });

        });


       

    $('#back').on('click',function(){
     
        $('#edit_form').hide();
        $('#insert_form').show();
    });


</script>
    
@endsection







<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                     <button type="button" class="btn"  ><a href="{{ URL::previous() }}" class="previous">&laquo; Back</a></button>
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                              <!--   <div class="image-container">
                                    <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div> -->
                                <div class="userData ml-1">
                                    <h2 class="d-block" style="font-size: 4rem; font-weight: bold"><a >{{$user['name']}}</a></h2>
                                    <!-- <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Video Uploads</h6>
                                    <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6> -->
                                </div>
                              <!--   <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                               <!--  <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                    </li>
                                </ul> -->
                                 <hr/>
                                <div >
                                    <div>
                                        

                                         <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Name:</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user['name']}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">User ID:</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user['id']}}
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Username:</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user['username']}}
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Functional Unit:</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user['functional_unit']}}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{$user['type']}}
                                               
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                 {{$user['status']}}
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                   <!--  ADD SUPERVISOR, FIX FUNCTIONAL UNIT, AND TYPE
 -->
                                   <!--  <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        Facebook, Google, Twitter Account that are connected to this account
                                    </div> -->
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
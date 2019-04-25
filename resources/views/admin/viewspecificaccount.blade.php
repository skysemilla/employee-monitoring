 <button type="button" class="btn"  ><a href="{{ URL::previous() }}" class="previous">&laquo; Back</a></button>
 <div class="container panel-body" >
    
              <div class="row">

                  <div class="panel panel-default widget" style="background-color: #85aa96">
                      <div class="panel-heading" style="background-color: #5c6d64">
                          <h4><b>
                              PERSONAL INFORMATION
                          </b></h4>
                          
                      </div>
                      <br>
                      <div >
                    <div class="row" >
                      <div class="col-sm-10" align="center"><h1 >{{$user->username}}</h1></div>
                   

                    </div>
                    <div class="row">
                      <div class="col-sm-3" style="padding-left:5%"><!--left col-->
              

                        <div class="text-center">
                          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        
                        </div><hr><br>

                                 
                          
                            
                            <ul class="list-group">
                              <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                              @if($user->type == "permanent" || $user->type == "nonpermanent")
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Reports</strong></span>{{$totalOwnReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Approved Reports</strong></span>{{$totalOwnApprovedReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Assessed Reports</strong></span>{{$totalOwnAssessedReports}}</li>
                              @elseif($user->type == "supervisor" )
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Reports</strong></span>{{$totalOwnReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Approved Reports (own)</strong></span>{{$totalOwnApprovedReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Assessed Reports (own)</strong></span>{{$totalOwnAssessedReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Approved Reports (as supervisor)</strong></span>{{$totalApprovedReports}}</li>
                              @elseif($user->type == "headofoffice" )
                                
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Approved Reports</strong></span>{{$totalApprovedReports}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Assessed Reports</strong></span>{{$totalAssessedReports}}</li>
                              @endif
                           
                            </ul> 
                                 
                      
                        </div>  <!-- col left -->
                          <div class="col-sm-9">
                            <div class="tab-content">
                              <div class="tab-pane active" id="home">
                                  <hr>
                                    <form class="form" action="##" method="post" id="registrationForm">
                                      <div class="form-group">
                                            
                                            <div class="col-xs-5">
                                                <label ><h4>User ID</h4></label>
                                                <input type="text" class="form-control" value="{{$user->id}}"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-group">
                                            
                                            <div class="col-xs-5">
                                                <label ><h4>Status</h4></label>
                                                <input type="text" class="form-control" value="{{$user->status}}"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="form-group">
                                            
                                            <div class="col-xs-5">
                                                <label ><h4>Name</h4></label>
                                                <input type="text" class="form-control" value="{{$user->name}}"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-xs-5">
                                                <label ><h4>Type</h4></label>
                                                <input type="text" class="form-control" value="{{$user->type}}"  readonly>
                                            </div>
                                        </div>

                  <!-- 
                      INSERT CONDITION IF ADMIN OR DIFFERENT TYPES OF USERS-->
                                         <div class="form-group">
                                            
                                            <div class="col-xs-5">
                                                <label ><h4>Functional Unit</h4></label>
                                                <input type="text" class="form-control" value="{{$user->functional_unit}}"  readonly>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="col-xs-5">
                                              <label ><h4>Supervisor</h4></label>
                                                @if($user->type == "permanent" || $user->type == "nonpermanent")
                                                  
                                                  <input type="text" class="form-control" value="{{$supervisor->name}}"  readonly>
                                                @elseif($user->type == "supervisor")
                                                
                                                <input type="text" class="form-control" value="{{$headofoffice->name}}"  readonly>
                                                @else
                                                  <input type="text" class="form-control" value="----------"  readonly>
                                                @endif
                                                
                                            </div>
                                        </div>
                                
                                  </form>
                       
                                
                               </div><!--/tab-pane-->
                              
                                </div><!--/tab-pane-->
                            </div><!--/tab-content-->

                          </div><!--/col-9-->

                    </div>



                  </div>
              </div>
          </div>
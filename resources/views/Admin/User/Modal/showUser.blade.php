<div class="modal fade" id="showuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"  dir="{{__("strings.ltr")}}">
            <div class="modal-header">
                <h5 class="modal-title"  id="exampleModalLabel">{{__("strings.Show_User_Info")}}</h5>
                <button type="button" style="{{__("strings.closeBtn")}}" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                   <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                        <div class="my-4">   
                                <div class="row mt-5 align-items-center">
                                    <div class="col-md-3 text-center mb-12">
                                        <div class="avatar avatar-xl">
                                            <img id="UserImage" src="" alt="..." class="avatar-img r" />
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__("strings.Firstname")}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="showUserFirstName"></p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__("strings.Lastname")}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="ShowUserLastName"></p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__("strings.Email")}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="ShowUserEmail"></p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__('strings.Country')}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="ShowUserCountry"></p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__("strings.Phone")}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="ShowUserPhone"></p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__('strings.role')}}</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p class="small mb-0 text-muted" id="ShowUserRole"></p>
                                    </div>
                                </div>
                            <hr class="my-4" />
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{__('strings.Address')}}</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <p class="small mb-0 text-muted" id="ShowUsreAddress"></p>
                                </div>
                            </div>
                        <hr class="my-4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
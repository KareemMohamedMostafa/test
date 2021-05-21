<div class="modal fade" id="formCompanyModal" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <form id="companyForm" action="{{ route('savecompany') }}" method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}

                <div class="container-fluid">

                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="card">

                                <div class="header">

                                    <h2><strong>Company</strong> Data</h2>

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <input type="hidden" value="0" id="id" name="id">

                                            <label>Fullname</label>

                                            <div class="form-group"> <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter fullname" required /> </div>

                                            <label>Email address</label>

                                            <div class="form-group"> <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required /> </div>

                                            <label>Phone</label>

                                            <div class="form-group"> <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone" required /> </div>

                                        </div>

                                        <div class="col-md-6">

                                            <label>Full Address</label>

                                            <div class="form-group"> <input type="text" id="address" name="address" class="form-control" placeholder="Enter address" /> </div>

                                            <label>Opening date</label>

                                            <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span> <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Enter birthdate"> </div>

                                            <label>Image</label>

                                            <div class="form-group"> <input type="file" id="image" name="image" class="form-control"> </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card">

                                <div class="header">

                                    <h2><strong>Social</strong> data</h2>

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <label>Webiste</label>

                                            <div class="form-group"> <input type="text" id="website" name="website" class="form-control" placeholder="Enter website"> </div>

                                            <label>Facebook</label>

                                            <div class="form-group"> <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Enter facebook"> </div>

                                            <label>Twitter</label>

                                            <div class="form-group"> <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Enter twitter"> </div>

                                            <label>Instagram</label>

                                            <div class="form-group"> <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Enter instagram"> </div>

                                        </div>

                                        <div class="col-md-6">

                                            <label>Specialty</label>

                                            <textarea name="specialty" id="specialty" rows="5" class="form-control" placeholder="Enter specialty"></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Save</button>

                </div>

            </form>

        </div>

    </div>

</div>
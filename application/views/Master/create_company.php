<?php $this->load->view('layout/header'); ?>
  <body class="animsition app-projects">
    <?php $this->load->view('layout/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="master.html">Master</a></li>
        <li class="breadcrumb-item"><a href="company_setup.html">Company Setup</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <form>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Create Company Code</h4>
                  
                  <div class="example">
                    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Company Code: </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Company Code" autocomplete="off"/>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Company Name: </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Company Name" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Middle Name: </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Middle Name" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Last Name: </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Last Name" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Logo: </label>
                        <div class="col-md-9">
                          <input type="file" class="form-control" name="name"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Plant : </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>ABC</option>
                            <option>XYZ</option>
                            <option>LMP</option>
                          </select>
                        </div>
                      </div>

                      <h5>Financial Year: </h5>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">From : </label>
                        <div class="col-md-9">
                          <input type="number" class="form-control" name="name" placeholder="From" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">To : </label>
                        <div class="col-md-9">
                          <input type="number" class="form-control" name="name" placeholder="To" autocomplete="off"
                          />
                        </div>
                      </div>



                      
                      
                  </div>
                </div>
              </div>




              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Communication</h4>
                  
                  <div class="example">
                    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Country: </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>INDIA</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Region: </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>Assam</option>
                            <option>Arunachal Pradesh</option>
                            <option>Bihar</option>
                            <option>Chattisgarh</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">City: </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>Guwahati</option>
                            <option>Shillong</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Postal Address: </label>
                        <div class="col-md-9">
                          <textarea class="form-control" name="name" placeholder="Address" autocomplete="off"></textarea>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Language: </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>English</option>
                            <option>Hindi</option>
                            <option>France</option>
                          </select>

                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Currency: </label>
                        <div class="col-md-9">
                          <select class="form-control">
                            <option>INR</option>
                            <option>USD</option>
                         </select> 
                        </div>
                      </div>



                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Telephone: </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Telephone" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row mobile">
                        <label class="col-md-3 col-form-label">Mobile : </label>
                        <div class="col-md-9">
                          <input type="number" class="form-control" name="name" placeholder="Mobile" autocomplete="off"
                          />

                        </div>

                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                          <a href="javascript:void(0)" class="btn btn-success btn-xs" id="add_mobile"> Add More Mobile <i class="fa fa-plus" aria-hidden="true"></i>
                          </a>
                        </label>
                        
                      </div>

                      



                      <div class="form-group row email">
                        <label class="col-md-3 col-form-label">Email : </label>
                        <div class="col-md-9">
                          <input type="email" class="form-control" name="name" placeholder="Email" autocomplete="off"
                          />
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                          <a href="javascript:void(0)"  id="add_email" class="btn btn-success btn-xs"> Add More Email <i class="fa fa-plus" aria-hidden="true"></i>
                          </a>
                        </label>
                        
                      </div>


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Fax : </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" placeholder="Fax" autocomplete="off"
                          />
                        </div>
                      </div>
                      
                  </div>
                </div>
                <!-- End Example Horizontal Form -->
              </div>



            </div>

            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-9">
                  <button type="submit" class="btn btn-primary">Submit </button>
                  <button type="reset" class="btn btn-default btn-outline">Reset</button>
                </div>
              </div>
            </div>


          </form>


          </div>


          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
<?php $this->load->view('layout/footer'); ?>
    

    
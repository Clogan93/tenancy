 @extends('dashboard')

 @section('css')
 <style type = "text/css">

    .btn-file {
      position: relative;
      overflow: hidden;
    }
    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
    }

 </style>
 @endsection

 @section('content')

  <!-- Content Wrapper. Contains page content -->

  <div class="row">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-md-12" style = "float:none;margin:auto">

         <div class="box box-primary">
            <!-- form start -->
              {!! Form::model($tenant, ['method' => 'PATCH', 'class' => 'form-horizontal', 'action' => ['TenantController@update', $tenant->id]]) !!}

                <div class="box-header with-border">
                  <h3 class="box-title">General Information</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="exampleInputtenantname" class="col-sm-2 control-label">Tenant name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tenantname" id="exampleInputtenantname" placeholder="Enter Tenant Name" value="{{ $tenant->tenantname }}">
                      {!! $errors->first('tenantname', '<p class="help-block alert-sm">:message</p>') !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputprovision" class="col-sm-2 control-label">Provision Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "provisintype" id = "exampleInputprovision" style="width: 100%;">
                        @if($tenant->domaintype == "domain")
                          <option value="domain" selected>Domain</option>
                          <option value="subdirectory">Subdirectory</option>
                        @elseif($tenant->domaintype == "subdirectory")
                          <option value="domain">Domain</option>
                          <option value="subdirectory" selected>Subdirectory</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDomain" class="col-sm-2 control-label">Domain</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="domain" id="exampleInputDomain" placeholder="Enter Domain" value="{{ $tenant->domain }}">
                      {!! $errors->first('domain', '<p class="help-block alert-sm">:message</p>') !!}
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Database</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="exampleInputdatabase" class="col-sm-2 control-label">Database Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "dbtype" id = "exampleInputdatabase" style="width: 100%;">
                        @if($tenant->databasetype == "mssql")
                          <option selected="selected" value="mssql">MSSQL</option>
                          <option value="mysql">MySQL</option>
                        @elseif($tenant->databasetype == "mysql")
                          <option value="mssql">MSSQL</option>
                          <option selected="selected" value="mysql">MySQL</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Appearance</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="exampleselecttheme" class="col-sm-2 control-label">Theme</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "selecttheme" id = "exampleselecttheme" style="width: 100%;">
                        <option selected="selected" value="default">Default</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleselectcolorscheme" class="col-sm-2 control-label">Color Scheme</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "selectcolorscheme" id = "exampleselectcolorscheme" style="width: 100%;">
                        <option selected="selected" value="default">Default</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="examplesitelogoformat" class="col-sm-2 control-label">Site / Logo Format</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "sitelogoformat" id = "examplesitelogoformat" style="width: 100%;">
                        <option selected="selected" value="iconandsite">Icon and Site</option>
                        <option value="logoonly">Logo Only</option>
                        <option value="siteonly">Site Only</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputlogo" class="col-sm-2 control-label">Logo</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "inputlogo" id = "inputlogo" style="width: 100%;">
                        <option selected="selected">Default</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputfavicon" class="col-sm-2 control-label">Favicon</label>
                    <div class="well" style="display:none;">
                      Output:
                      <pre class="output"></pre>
                    </div>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <label class="input-group-btn">
                          <label class="btn btn-default btn-file upload-btn">
                              Browse <input type="file" id="inputfavicon" name="inputfavicon" style="display: none;">
                          </label>
                        </label>
                        {!! Form::text( 'faviconname', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                        <input type = "hidden" id = "favicon_path" name="favicon_path" class="image_path" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputdatabase" class="col-sm-2 control-label">Copyright Message</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="copyrightmessage" id="exampleCopyright" placeholder="Enter Copyright Message">
                      {!! $errors->first('copyrightmessage', '<p class="help-block alert-sm">:message</p>') !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="custommenu" class="col-sm-2 control-label">Custom menu</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "custommenu" id = "custommenu" style="width: 100%;">
                        <option selected="selected" value="default">Default</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="headerlayout" class="col-sm-2 control-label">Header Layout</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "headerlayout" id = "headerlayout" style="width: 100%;">
                        <option selected="selected" value="default">Default</option>
                        <option value="fixed">Fixed</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleleftsidebar" class="col-sm-2 control-label">Left Sidebar</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "leftsidebar" id = "exampleleftsidebar" style="width: 100%;">
                        <option selected="selected" value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="examplerightsidebar" class="col-sm-2 control-label">Right Sidebar</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "rightsidebar" id = "examplerightsidebar" style="width: 100%;">
                        <option selected="selected" value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Header</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="examplelandingpage" class="col-sm-2 control-label">Landing page</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "landingpage" id = "examplelandingpage" style="width: 100%;">
                        <option selected="selected" value="userdashboard">User Dashboard</option>
                        <option value="genericdashboard">Generic Dashboard</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="examplefrontbanner" class="col-sm-2 control-label">Front Page Banner Style</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "frontbanner" id = "examplefrontbanner" style="width: 100%;">
                        <option selected="selected" value="slider">Slider</option>
                        <option value="static">Static</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class = "sliderpart">
                    <div class="form-group">
                      <label for="examplesliderinterval" class="col-sm-2 control-label">Slider Interval</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="sliderinterval" id="examplesliderinterval" placeholder="Enter Slider Interval" value="5000">
                        {!! $errors->first('sliderinterval', '<p class="help-block alert-sm">:message</p>') !!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="examplesliderautoplay" class="col-sm-2 control-label">Set Slider Autoplay</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "sliderautoplay" id = "examplesliderautoplay" style="width: 100%;">
                          <option selected="selected" value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="examplenoslides" class="col-sm-2 control-label">No of slides</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "noslides" id = "examplenoslides" style="width: 100%;">
                          <option selected="selected" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleinputslide1" class="col-sm-2 control-label">Images for slider</label>
                      <div class="col-sm-10">
                        <div class="input-group slider-image" id="slider1">
                          <label class="input-group-btn">
                            <label class="btn btn-default btn-file">
                                Browse <input type="file" id="inputimageforslider1" name="inputimageforslider1" style="display: none;">
                            </label>
                          </label>
                          {!! Form::text( 'imageslider1name', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                          <input type = "hidden" id = "sliderimg1_path" name="sliderimg1_path" class="image_path" value="">
                        </div>
                        <div class="fileupload sliderimage2" data-url="{{url('/')}}/media-upload">
                          <div class="input-group slider-image" id="slider2">
                            <label class="input-group-btn">
                              <label class="btn btn-default btn-file">
                                  Browse <input type="file" id="inputimageforslider2" name="inputimageforslider2" style="display: none;">
                              </label>
                            </label>
                            {!! Form::text( 'imageslider2name', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                            <input type = "hidden" id = "sliderimg2_path" name="sliderimg2_path" class="image_path" value="">
                          </div>
                        </div>
                        <div class="fileupload sliderimage3" data-url="{{url('/')}}/media-upload">
                          <div class="input-group slider-image" id="slider3">
                            <label class="input-group-btn">
                              <label class="btn btn-default btn-file">
                                  Browse <input type="file" id="inputimageforslider3" name="inputimageforslider3" style="display: none;">
                              </label>
                            </label>
                            {!! Form::text( 'imageslider3name', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                            <input type = "hidden" id = "sliderimg3_path" name="sliderimg3_path" class="image_path" value="">
                          </div>
                        </div>
                        <div class="fileupload sliderimage4" data-url="{{url('/')}}/media-upload">
                          <div class="input-group slider-image" id="slider4">
                            <label class="input-group-btn">
                              <label class="btn btn-default btn-file">
                                  Browse <input type="file" id="inputimageforslider4" name="inputimageforslider4" style="display: none;">
                              </label>
                            </label>
                            {!! Form::text( 'imageslider4name', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                            <input type = "hidden" id = "sliderimg4_path" name="sliderimg4_path" class="image_path" value="">
                          </div>
                        </div>
                        <div class="fileupload sliderimage5" data-url="{{url('/')}}/media-upload">
                          <div class="input-group slider-image" id="slider5">
                            <label class="input-group-btn">
                              <label class="btn btn-default btn-file">
                                  Browse <input type="file" id="inputimageforslider5" name="inputimageforslider5" style="display: none;">
                              </label>
                            </label>
                            {!! Form::text( 'imageslider5name', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                            <input type = "hidden" id = "sliderimg5_path" name="sliderimg5_path" class="image_path" value="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleslidertext" class="col-sm-2 control-label">Add Slider Text</label>
                      <div class="col-sm-10">
                        <textarea id="exampleslidertext" name="slidertext" rows="10" cols="80">
                          This is part for slider text.
                        </textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampletextbuttonslider" class="col-sm-2 control-label">Add Text Button on Slider</label>
                      <div class="col-sm-10">
                        <input type="text" name="textbuttonslider" id="exampletextbuttonslider" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="examplelinksliderbtn" class="col-sm-2 control-label">Add Link on Slider Button</label>
                      <div class="col-sm-10">
                        <input type="text" name="linksliderbtn" id="examplelinksliderbtn" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="staticpart">
                    <div class="form-group">
                      <label for="examplecontenttype" class="col-sm-2 control-label">Content Type</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "contenttype" id = "examplecontenttype" style="width: 100%;">
                          <option selected="selected" value="image">Image</option>
                          <option value="video">Video</option>                          
                        </select>
                      </div>
                    </div>

                    <div class="videopart">
                      <div class="form-group">
                        <label for="examplevideourl" class="col-sm-2 control-label">Video URL</label>
                        <div class="col-sm-10">
                          <input type="text" name="videourl" id="examplevideourl" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="examplevideofile" class="col-sm-2 control-label">Video File</label>
                        <div class="col-sm-10">
                          <div class="fileupload staticvideo" data-url="{{url('/')}}/media-upload">
                            <div class="input-group">
                              <label class="input-group-btn">
                                <label class="btn btn-default btn-file">
                                    Browse <input type="file" id="staticvideo" name="staticvideo" style="display: none;">
                                </label>
                              </label>
                              {!! Form::text( 'staticvideoname', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                              <input type = "hidden" id = "staticvideo_path" name="staticvideo_path" class="video_path" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="imagepart">
                      <div class="form-group">
                        <label for="exampleimageurl" class="col-sm-2 control-label">Image URL</label>
                        <div class="col-sm-10">
                          <input type="text" name="imageurl" id="exampleimageurl" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleimagefile" class="col-sm-2 control-label">Image File</label>
                        <div class="col-sm-10">
                          <div class="fileupload staticimage" data-url="{{url('/')}}/media-upload">
                            <div class="input-group">
                              <label class="input-group-btn">
                                <label class="btn btn-default btn-file">
                                    Browse <input type="file" id="staticimage" name="staticimage" style="display: none;">
                                </label>
                              </label>
                              {!! Form::text( 'staticimagename', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                              <input type = "hidden" id = "staticimage_path" name="staticimage_path" class="image_path" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="examplefacebook" class="col-sm-2 control-label">Facebook Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="examplefacebook" name="fbsetting" placeholder="Enter your site's facebook page link. For eg. https://www.facebook.com/pagename">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampletwitter" class="col-sm-2 control-label">Twitter Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="exampletwitter" name="twitsetting" placeholder="Enter your site's twitter page link. For eg. https://www.twitter.com/pagename">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="examplelinkedin" class="col-sm-2 control-label">Linkedin Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="examplelinkedin" name="linkesetting" placeholder="Enter your site's linkedin page link. For eg. https://www.linkedin.com/in/pagename">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="examplegoogleplus" class="col-sm-2 control-label">Google Plus Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="examplegoogleplus" name="gpsetting" placeholder="Enter your site's Google Plus page link. For eg. https://plus.google.com/pagename">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleyoutube" class="col-sm-2 control-label">Youtube Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="exampleyoutube" name="ytsetting" placeholder="Enter your site's Youtube page link. For eg. https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleinstagram" class="col-sm-2 control-label">Instagram Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="exampleinstagram" name="instasetting" placeholder="Enter your site's Instagram page link. For eg. https://www.linkedin.com/company/name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="examplepinterest" class="col-sm-2 control-label">Pinterest Settings</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="examplepinterest" name="pintsetting" placeholder="Enter your site's Pinterest page link. For eg. https://www.pinterest.com/name">
                    </div>
                  </div> 
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Analytics</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="exampleanalyticstype" class="col-sm-2 control-label">Analytics Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name = "analyticstype" id = "exampleanalyticstype" style="width: 100%;">
                        <option selected="selected" value="google">Google</option>
                        <option value="internal">Internal</option>                          
                      </select>
                    </div>
                  </div>

                  <div class="googlepart">
                    <div class="form-group">
                      <label for="examplegoogletrackingid" class="col-sm-2 control-label">Google Analytics Tracking ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="examplegoogletrackingid" name="googletrackingid" placeholder="Enter Google Analytics Tracking ID">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Footer Content for 1st Column</h3>
                </div>

                <div class="box-body box-form-body footer-content">
                  <div class="form-group">
                    <label for="exampleInputlstfootertitle" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="1stfootertitle" id="exampleInputlstfootertitle" placeholder="Enter 1st Footer Column Title">
                      {!! $errors->first('1stfootertitle', '<p class="help-block alert-sm">:message</p>') !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputlstfootertype" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2 footer-type" name = "lstfootertype" id = "exampleInputlstfootertype" style="width: 100%;">
                        <option selected="selected" value="html">HTML</option>
                        <option value="widget">Widget</option>                          
                      </select>
                    </div>
                  </div>

                  <div class="htmlpart">
                    <div class="form-group">
                      <label for="exampleInputlstfooterhtml" class="col-sm-2 control-label">Custom HTML</label>
                      <div class="col-sm-10">
                        <textarea id="exampleInputlstfooterhtml" name="lstfooterhtml" rows="10" cols="80">
                          This is part for html of lst Column Footer.
                        </textarea>
                      </div>
                    </div>
                  </div>

                  <div class="widgetpart">
                    <div class="form-group">
                      <label for="exampleInputlstfooterwidget" class="col-sm-2 control-label">Widget</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "lstfooterwidget" id = "exampleInputlstfooterwidget" style="width: 100%;">
                          <option selected="selected" value="topcourses">Top Courses</option>
                          <option value="topannouncements">Top Announcements</option> 
                          <option value="onlineusers">Online Users</option>                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Footer Content for 2nd Column</h3>
                </div>

                <div class="box-body box-form-body footer-content">
                  <div class="form-group">
                    <label for="exampleInput2ndfootertitle" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="2ndfootertitle" id="exampleInput2ndfootertitle" placeholder="Enter 2nd Footer Column Title">
                      {!! $errors->first('2ndfootertitle', '<p class="help-block alert-sm">:message</p>') !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInput2ndfootertype" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2 footer-type" name = "2ndfootertype" id = "exampleInput2ndfootertype" style="width: 100%;">
                        <option selected="selected" value="html">HTML</option>
                        <option value="widget">Widget</option>                          
                      </select>
                    </div>
                  </div>

                  <div class="htmlpart">
                    <div class="form-group">
                      <label for="exampleInput2ndfooterhtml" class="col-sm-2 control-label">Custom HTML</label>
                      <div class="col-sm-10">
                        <textarea id="exampleInput2ndfooterhtml" name="2ndfooterhtml" rows="10" cols="80">
                          This is part for html of 2nd Column Footer.
                        </textarea>
                      </div>
                    </div>
                  </div>

                  <div class="widgetpart">
                    <div class="form-group">
                      <label for="exampleInput2ndfooterwidget" class="col-sm-2 control-label">Widget</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "2ndfooterwidget" id = "exampleInput2ndfooterwidget" style="width: 100%;">
                          <option selected="selected" value="topcourses">Top Courses</option>
                          <option value="topannouncements">Top Announcements</option> 
                          <option value="onlineusers">Online Users</option>                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Footer Content for 3rd Column</h3>
                </div>

                <div class="box-body box-form-body footer-content">
                  <div class="form-group">
                    <label for="exampleInput3rdfootertitle" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="3rdfootertitle" id="exampleInput3rdfootertitle" placeholder="Enter 3rd Footer Column Title">
                      {!! $errors->first('3rdfootertitle', '<p class="help-block alert-sm">:message</p>') !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInput3rdfootertype" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                      <select class="form-control select2 footer-type" name = "3rdfootertype" id = "exampleInput3rdfootertype" style="width: 100%;">
                        <option selected="selected" value="html">HTML</option>
                        <option value="widget">Widget</option>                          
                      </select>
                    </div>
                  </div>

                  <div class="htmlpart">
                    <div class="form-group">
                      <label for="exampleInput3rdfooterhtml" class="col-sm-2 control-label">Custom HTML</label>
                      <div class="col-sm-10">
                        <textarea id="exampleInput3rdfooterhtml" name="3rdfooterhtml" rows="10" cols="80">
                          This is part for html of 3rd Column Footer.
                        </textarea>
                      </div>
                    </div>
                  </div>

                  <div class="widgetpart">
                    <div class="form-group">
                      <label for="exampleInput3rdfooterwidget" class="col-sm-2 control-label">Widget</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name = "lstfooterwidget" id = "exampleInput3rdfooterwidget" style="width: 100%;">
                          <option selected="selected" value="topcourses">Top Courses</option>
                          <option value="topannouncements">Top Announcements</option> 
                          <option value="onlineusers">Online Users</option>                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Login Page</h3>
                </div>

                <div class="box-body box-form-body">
                  <div class="form-group">
                    <label for="exampleloginbackground" class="col-sm-2 control-label">Page Background</label>
                    <div class="col-sm-10">
                      <div class="fileupload loginback" data-url="{{url('/')}}/media-upload">
                        <div class="input-group">
                          <label class="input-group-btn">
                            <label class="btn btn-default btn-file">
                                Browse <input type="file" id="loginbkg" name="loginbkg" style="display: none;">
                            </label>
                          </label>
                          {!! Form::text( 'loginbkgname', null, ['class' => 'form-control orginal_name', 'readonly']) !!}
                          <input type = "hidden" id = "loginbkg_path" name="loginbkg_path" class="image_path" value="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="logintextcolor" class="col-sm-2 control-label">Login Panel Text Color</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control my-colorpicker1" id="logintextcolor" name="logintextcolor">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="inputenableloginpopup"> Enable Login Popup
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="adminusername" class="col-sm-2 control-label">Admin Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="adminusername" name="adminusername" value="admin">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="adminfullname" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="adminfullname" name="adminfullname" value="Administrator">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="adminpass" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="adminpass" name="adminpass">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="inputallowsignup"> Allow Sign-ups
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="inputallowguestlogin"> Allow Guest Logins
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Tenant Manager</h3>
                </div>

                <div class="box-body box-form-body">
                  <label for="defaulttenantmanager" class="col-sm-2 control-label">Default Tenant Manager</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name = "defaulttenantmanager" id = "defaulttenantmanager" style="width: 100%;">
                      @foreach($temanagers as $manager)
                        @if($tenant->username == $manager->username)
                          <option value="{{ $manager->id }}" selected>{{ $manager->username }}</option>
                        @else
                          <option value="{{ $manager->id }}">{{ $manager->username }}</option>
                        @endif                        
                      @endforeach                         
                    </select>
                  </div>
                </div>

                <div class="box-header with-border">
                  <h3 class="box-title">Version</h3>
                </div>

                <div class="box-body box-form-body">
                  <label for="version" class="col-sm-2 control-label">Version</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="version" name="version" value="{{ $tenant->version }}">
                  </div>
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              {!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
<!-- Select2 -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/select2/select2.full.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/fastclick/fastclick.js') }}"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //show(hide) slider and static part when selecting front page banner style option
    if($("#examplefrontbanner").val() == "slider"){
      $(".staticpart").hide();
    }else if($("#examplefrontbanner").val() == "static"){
      $(".sliderpart").hide();
    }

    $("#examplefrontbanner").change(function(){
      if($("#examplefrontbanner").val() == "slider"){
        $(".staticpart").slideUp(400, function(){
          $(".sliderpart").slideDown(400);
        });
      }else if($("#examplefrontbanner").val() == "static"){
        $(".sliderpart").slideUp(400, function(){
          $(".staticpart").slideDown(400);
        });
      }
    });

    //show images for slider according to no of slides
    $(".slider-image").each(function(){
      if(parseInt($(this).attr("id").substring(6)) > parseInt($("#examplenoslides").val()))
        $(this).hide();
      else
        $(this).show();
    });

    $("#examplenoslides").change(function(){
      $(".slider-image").each(function(){
        if(parseInt($(this).attr("id").substring(6)) > parseInt($("#examplenoslides").val()))
          $(this).hide();
        else
          $(this).show();
      });
    });

    //show(hide) image and video part when selecting content type option of static part.
    if($("#examplecontenttype").val() == "image"){
      $(".imagepart").show();
      $(".videopart").hide();
    }else if($("#examplecontenttype").val() == "video"){
      $(".imagepart").hide();
      $(".videopart").show();
    }

    $("#examplecontenttype").change(function(){
      if($("#examplecontenttype").val() == "image"){
        $(".videopart").slideUp(400, function(){
          $(".imagepart").slideDown(400);
        });
      }else if($("#examplecontenttype").val() == "video"){
        $(".imagepart").slideUp(400, function(){
          $(".videopart").slideDown(400);
        });
      }
    });

    //show(hide) Google Analytics Tracking ID when selecting content type option of Google Analytics Type.
    if($("#exampleanalyticstype").val() == "google"){
      $(".googlepart").show();
    }else{
      $(".googlepart").hide();
    }

    //show(hide) HTML and Widget part according to the value of footer content type
    $(".footer-content").each(function(){
      if($(this).find(".footer-type").val() == "html"){
        $(this).find(".htmlpart").show();
        $(this).find(".widgetpart").hide();
      }else if($(this).find(".footer-type").val() == "widget"){
        $(this).find(".htmlpart").hide();
        $(this).find(".widgetpart").show();
      }
    });

    $(".footer-type").change(function(){
      if($(this).val() == "html"){
        $(this).parent().parent().parent().find(".widgetpart").slideUp(400, function(){
          $(this).parent().find(".htmlpart").slideDown(400);
        });
      }else if($(this).val() == "widget"){
        $(this).parent().parent().parent().find(".htmlpart").slideUp(400, function(){
          $(this).parent().find(".widgetpart").slideDown(400);
        });
      }
    });

    //image upload script
    $('input[type=file]').change(function(){
      // AJAX Request
      $.post( '/media-upload', {file: $(this).val()} )
        .done(function( data )
        {
          if(data.error)
          {
            // Log the error
            alert("error");
          }
          else
          {
            // Change the image attribute
            alert(data.path);
          }
        });
    });
    
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    // Replace the <textarea id="exampleslidertext"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('exampleslidertext');
    // Replace the <textarea id="exampleInputlstfooterhtml"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('exampleInputlstfooterhtml');
    // Replace the <textarea id="exampleInput2ndfooterhtml"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('exampleInput2ndfooterhtml');
    // Replace the <textarea id="exampleInput3rdfooterhtml"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('exampleInput3rdfooterhtml');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
@endsection
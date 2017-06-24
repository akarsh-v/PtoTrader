    <div class="container">
          <div class="row content-row">
            <div class="col-md-12 below-slider-content request-form">
              <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>
          </div>
    </div>
    <div class="container content-container">
        <div class="row content-row">
            <div class="col-md-8 below-slider-content request-form">
                <form id="sky-form4" method="post" action="<?=site_url(); ?>/home/contact_form" class="log-reg-block sky-form" novalidate="novalidate">
                    <h2>Contact Us</h2>
                    <div class="row">
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <label class="control-label col-md-12" for="email">Name:</label>
                            <div class="col-md-12">
                              <input name="name" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6 form-group">
                            <label class="control-label col-md-12" for="email">Email:</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <label class="control-label col-md-12" for="email">Phone:</label>
                            <div class="col-md-12">
                              <input name="phone" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6 form-group">
                            <label class="control-label col-md-12" for="email">Type Of Service:</label>
                            <div class="col-md-12">
                              <select class="form-control" name="tos">
                                <option value="enquiry">Enquiry</option>
                                <option value="demo">Demo</option>
                                <option value="suggestions">Suggestions</option>
                              </select>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row request-button">
                        <div class="col-md-12">
                          <button class="btn btn-success">Send</button>
                        </div>
                    </div>
                </form>
                <div class="margin-bottom-20"></div>
            </div>
            <div class="col-md-4" style="padding-right: 0px;">
              <div class="paper" style="height: 411px;">
                <div class="page">
                   <address>
                    Type A 491 NB
                    Donimalai Township
                    Sandur Bellary
                    583118
                   </address>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC--gz647OxZMjWDkTbYQnapmeAQMBIAmM&callback=myMap"></script>
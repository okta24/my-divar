  <div id="cityModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="cancel" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">انتخاب شهر </h4>
                    </div>
                    <div class="modal-body">
                       
                               <div id="loader_city"class='loadingmessage' style='display:none'>
       <img src='img/ajax-loader.gif'/>
</div>
                        <div id="concept" class="row ">

                            <div class="col-sm-6 ">
                                <!--parent select-->
                                <label for="ostanha_combo"> استان:</label>
                                <select onchange="get_ostan_id()" class="form-control" id="ostanha_combo">
                                  </select>
                                <!--parent select-->
                            </div>
                            <div class="col-sm-6">
                                <!--sub select-->
                                <label for="city_combo">شهر:</label>
                                <select id="city_combo" class="form-control">
                                  </select>
                                <!--sub select-->
                            </div>
                            <div class="col-sm-12 gravity_center">
                                <button data-dismiss="modal" id="accept_city" type="button" class=" margin_top5 width_80 btn btn-info btn-lg">تایید شهر </button>
                            </div>
                        </div>
                        <!--row 1 end-->
                    </div>

                </div>

            </div>
        </div>
    <div id="listsport" >
        <div class="row dash-cols">

            <div class="col-sm-6 col-md-6 col-lg-4" ng-repeat="row in rows" >               
                <a ng-href="#/view/{{$index}}/{{row.sportId}}">
                    <div class="widget-block">
                        <div class="white-box padding">
                            <div class="row info">
                                <div>
                                    <h3>{{row.sportName}}</h3>
                                </div>
                                <div>
                                    <div id="com_stats" style="height:98px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

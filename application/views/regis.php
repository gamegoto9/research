<h2>กีฬา : {{row.sportName}}</h2>


<div class="content" >
    <div class="block-flat">
        <form style="border-radius: 0px;" class="form-horizontal" ng-controller="viewController" ng-submit="submitForm()">

            <div class="form-group">
                <label for="inputNum" class="col-sm-2 control-label">คำนำหน้า</label>
                <div class="col-sm-10">
                    <select ng-model="titleList" ng-options="title as title.label for title in titles">
                        <option value="">+เลือก+</option>
                    </select>   
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ชื่อ</label>
                <div class="col-sm-3">
                    <input id="inputName" type="text" placeholder="Name" class="form-control" ng-model="name">
                </div>
                <label for="inputLastName" class="col-sm-1 control-label">นามสกุล</label>
                <div class="col-sm-3">
                    <input id="inputLastName" type="text" placeholder="LastName" class="form-control" ng-model="lname">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIdpass" class="col-sm-2 control-label">รหัสหนังสือเดินทาง</label>
                <div class="col-sm-3">
                    <input id="inputIDpass" type="text" placeholder="Passport Number" class="form-control" ng-model="passportid">
                </div>    
                <label for="inputType" class="col-sm-1 control-label">สัญชาติ</label>
                <div class="col-sm-1">
                    <input id="inputType" type="text" placeholder="Nations.." class="form-control"ng-model="nation">
                </div> 
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">ประเภทนักศึกษา</label>
                <div class="col-sm-6">
                    <label class="radio-inline" data-ng-repeat="stdType in stdTypes1.stdTypes">
                        <input type="radio" name="std1" data-ng-model="stdType.isUserAnswer" value="true" /> {{stdType.text}}
                    </label>
                    

                </div>
            </div>


<!--            <div class="form-group">
                <div style="position:relative;">
                    <label class="col-sm-2 control-label">รูปภาพ</label>
                    <a class='btn btn-info btn-sm' href='javascript:;'>
                        Choose Image Files...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="ImgUpload[]" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
            </div>

            <div class="form-group">
                <div style="position:relative;">
                    <label class="col-sm-2 control-label">ไฟล์หน้า หนังสือเดินทาง</label>
                   
                    <input type="file" class="btn btn-warning btn-sm"/>
                  
                    <a class='btn btn-warning btn-sm'>
                        Choose File...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="ImgUpload[]" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
            </div>-->

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-success">Registrer</button>
                    <pre style="display:none;">{{ message }}</pre>
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </div>


        </form>
    </div>
    
    
    
    <div class="block-flat">
        <h3>รายชื่อนักฬา : {{row.sportName}}</h3>
        <div class="table-responsive" ng-controller="PlayerListCtrl">
            <table tasty-table class="table" id="table">
                <thead class="centered">
                    <tr>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>รหัสหนังสือเดินทาง</th>
                        <th>สัญชาติ</th>
                        <th>สัญชาติ</th>
                        <th>ดู</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="player in players">
                        <td>{{ player.stdID}}</td>
                        <td>{{ player.stdName}}</td>
                        <td>{{ player.sportId}}</td>
                        <td>{{ player.passportId}}</td>
                        <td>{{ player.nation}}</td>
                        <td>{{ player.typeId}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val());
    });
</script>
/* 
 Producrt list controllers
 */
App.controller('varifyAccount', function($scope, $http, $timeout, $interval) {

    $scope.varifyaccountdata = { "status": 0, "message": "" };
    $scope.sendOTP = function() {
        $scope.varifyaccountdata.status = 1;
        var formdata = new FormData();
        formdata.append("mobile_no", $scope.varifyaccountdata.mobile_no);
        var filterurl = baseurl + "Api/varifyAccountOtp";
        $http({
            method: "POST",
            url: filterurl,
            data: formdata,
        }).then(function(rdata) {
            var returndata = rdata.data;
            console.log(returndata);

            $timeout(function() {
                $scope.varifyaccountdata.message = returndata["message"];
                if (returndata["usercheck"] == "0") {
                    $scope.varifyaccountdata.status = 0;
                }
                if (returndata["usercheck"] == "1") {
                    $scope.varifyaccountdata.status = 2;
                }
                
                 if (returndata["status"] == "2") {
                    $scope.varifyaccountdata.status = 3;
                }
            }, 2000);
        })


    }

})
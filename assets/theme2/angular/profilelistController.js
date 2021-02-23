/* 
 Producrt list controllers
 */
App.controller('ProfileListController', function ($scope, $http, $timeout, $interval) {


    $scope.profileResults = {"filters": {}};
    $scope.init = 0;
    $scope.checkproduct = 0;
    var filterurl = adminapiurl + "FrontApi/memberFilterApi";
    $scope.profileProcess = {'state': 1, 'pagination': {'paginate': [1, 16], 'perpage': 16}, 'products': []};
    $scope.filters = {"filters":{}, "member_counter":""};
    $http.get(filterurl).then(function (result) {
        $scope.filters.filters = result.data.filter;

        var totalcountdata = result.data.total_members;
        var member_counter = [];
        for (i = 1; i <= totalcountdata; i++) {
            member_counter.push(i);
        }
        $scope.filters['member_counter'] = member_counter;

        $timeout(function () {
            $('#paging_container3').pajinate({
                items_per_page: 16,
                num_page_links_to_display: 5,
            });
            $scope.checkProduct();

            $(".page_link").click(function () {
                $("html, body").animate({scrollTop: 0}, "slow")
            })
            $scope.getProfiles();

        }, 1000)
    });

    $scope.getProfiles = function (attrs) {
        $scope.profileProcess.state = 1;
        var argsk = [];
        var countdata = $(".info_text").text().split(" ")[1];
        if (Number(countdata[0])) {
            if (countdata) {
                countdata = countdata.split("-");
            }
        } else {
            countdata = [1, 16];
        }
        var paginationdata = "start=" + countdata[0] + "&end=" + countdata[1];
        argsk.push(paginationdata);
        var stargs = argsk.join("&");
        var url = adminapiurl + "FrontApi/memberListApi/";

        if (stargs) {
            url = url + "?" + stargs;
        }
        $http.get(url).then(function (result) {

            $scope.profileResults.memberslist = result.data.memberslist;



            if ($scope.profileResults.memberslist.length) {
                $scope.profileProcess.state = 2;
            } else {
                $scope.profileProcess.state = 0;
            }
            $scope.init = 1;
        }, function () {
            $scope.profileProcess.state = 0;
        });
    }









    $scope.checkProduct = function () {
        var countdata = $(".info_text").text().split(" ")[1];
        if (countdata) {
            var countdata1 = countdata.split("-");
            countdata = [Number(countdata1[0]), Number(countdata1[1])];
        } else {
            countdata = [1, 12];
        }
    }
    $(document).on("click", ".page_link", function () {
        $scope.profileProcess.currentpage = $(this).attr("longdesc");
        $scope.getProfiles();
    });

    $(document).on("click", ".last_link", function () {
        $scope.profileProcess.currentpage = "last";
        $scope.getProfiles();
    });
    $(document).on("click", ".first_link", function () {
        $scope.profileProcess.currentpage = "last";
        $scope.getProfiles();
    });

    $(document).on("click", ".next_link", function () {
        $scope.profileProcess.currentpage = Number($scope.profileProcess.currentpage) + 1;
        $scope.getProfiles();
    });
    $(document).on("click", ".previous_link", function () {
        $scope.profileProcess.currentpage = Number($scope.profileProcess.currentpage) - 1;
        $scope.getProfiles();
    });





})

App.controller('ProfileDetailsController', function ($scope, $http, $timeout, $interval) {
    $scope.memberprofile = {"profile":{}};
    var url = adminapiurl + "FrontApi/getShadiProfileById/"+member_profile_id;
    $http.get(url).then(function(result){
        $scope.memberprofile.profile = result.data;
    })
})

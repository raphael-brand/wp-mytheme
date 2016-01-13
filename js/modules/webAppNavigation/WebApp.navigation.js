/**
 * Created by raphael on 04.11.15.
 */
'use strict';

(function() {
  angular.module('webAppNavigation', [])

    .controller('SwipeCtrl', ['$log', '$nav', '$scope', '$location', function ($log, $nav, $scope, $location) {

      $scope.init = function() {

        $scope.current = $nav.currentIndex();
        $scope.items = {
          count: $nav.size()
        };
        $log.info('init called ... $scope.current:', $scope.current);
      };

      $scope.init();

      $scope.navigateTo = function(index) {

        $scope.current = $nav.currentIndex()+(index || 0);
        
        if($scope.current > $nav.size()-1 || $scope.current < 0) {
        	$log.log($scope.current+index);
          return $log.warn('$nav index out of range.');
        }

        $log.info('navigateTo():');

        var value = $nav.links().eq($scope.current).attr('href').substr(1);

        $location.path(value);
        jQuery('#menu-main a[href="#'+value+'"]').click();
      };


      $scope.index = function () {
        $log.info('index() called: ',$scope.current);
      };

    }])
    .factory('$nav', [ '$location', function ($location) {

      return {
        links: function () {
            return jQuery('.navbar-header a, .nav.navbar-nav a');
        },
        size: function () {
          return this.links().length;
        },
        currentIndex: function () {
            var elm = this.links();
            return jQuery(elm)
              .index(jQuery('a[href="#'+$location.path().substr(1)+'"]'));
        }
      };
    }]);

})();

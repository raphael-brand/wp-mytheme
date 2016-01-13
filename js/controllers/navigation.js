/**
 * Created by raphael on 03.11.15.
 */
'use strict';

(function () {
    var myapp = angular.module('myapp');
    
    var TitleCtrl = function() {};
    
    var t = TitleCtrl.prototype;
    
    t.init = function(title) {
    	jQuery('title').text(title);
    };
    
    myapp.service('TitleCtrl', TitleCtrl);
    
    myapp.controller('NavBarCtrl', ['$rootScope', '$location', 'TitleCtrl', function ($rootScope, $location, TitleCtrl) {
        var vm = this;

        vm.make_ng_links = function () {
            var $el = angular.element(document.querySelector('.nav.navbar-nav')).children();
			var index = 0;
            angular.forEach($el, function (element) {
                var link = angular.element(element).find('a');
                link.attr('href', link.attr('href').replace(/.*\/(.+)\/$/gi, '#$1'))
                .attr('data-toggle', 'tab');
				
				if(!index) 
					link.parent().addClass('navbar-brand');
				
                jQuery(element).find('a').on('click', function() {
                    $location.path(jQuery(this).attr('href').substr(1));
                    TitleCtrl.init(jQuery('*[id="'+jQuery(this).attr('href').substr(1)+'"]').attr('rb-set-title'));
                });
                index++;
            });

            angular.element(document.querySelector('.nav.navbar-nav'))
                .attr('data-tabs','tabs');
			if(jQuery('a[href="#'+$location.path().substr(1)+'"]').size())
            	jQuery('a[href="#'+$location.path().substr(1)+'"]').click();
            else
            	jQuery('a[href="#index"]').click();
        };


    }]);
})();

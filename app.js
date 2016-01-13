(function() {

	// initialize the app
	var myapp = angular.module('myapp', ['ngSanitize', 'ngTouch', 'ngRoute', 'webAppNavigation']);

	myapp.run(['$rootScope', '$location',
	function($rootScope, $location) {

		$rootScope.$on('$locationChangeStart', function(e, current, pre) {
			jQuery('.navbar.navbar-default a[href="#' + $location.path().replace('/', '') + '"]').tab('show');
		});

		jQuery('.navbar.navbar-default').tab();

		if (jQuery(window).width() >= 768)
			jQuery('.navbar-toggle').click();

		if ($location.path().length < 3) {
			var start = 'index';
			$location.path(start);
			$location.replace();
		}

		jQuery('#index a:contains("kontakt")').click(function() {
			var val = jQuery(this).attr('href').substr(1);
			return jQuery('#menu-main a[href="#' + val + '"]').click();
		});

	}]);

	myapp.controller('FooterCtrl', function() {
		var vm = this;
		vm.xingProfile = 'https://www.xing.com/profile/Raphael_Brand3';

	});
})();

'use strict';

(function () {
    function init() {
        var router = new Router([            
            new Route('orderCert', 'orderCert.php'),
            new Route('checkStatus', 'checkStatus.html'),
        ]);
    }
    init();
}());
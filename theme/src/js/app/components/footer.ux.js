class FooterUX {
    
    constructor() {
    }

    init() {

    }
}

$(document).ready(() => {

    if($('#page-footer').length){
        let _module = new FooterUX();
        _module.init();
    }

});
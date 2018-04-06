var isContent = false;

function changeTo(size){
    $$('.viewport-button').removeClass('is_active');
    if($$('html').hasClass('render-'+size)[0]){size='';}
    $$('html').removeClass('render-xxs').removeClass('render-xs').removeClass('render-sm').removeClass('render-md').removeClass('render-lg').removeClass('render-xlg');
    if(size){$$('html').addClass('render-'+size);$$('.viewport-button.button-'+size).addClass('is_active');}
    return false;
}

window.addEvent('load', function() {
    $$('.viewport_panel').getPrevious('.tl_submit_panel').addClass('hidden');
    var wrappers = [];
    if(window.location.search.substring(1).indexOf('table=tl_content')!=-1||window.location.search.substring(1).indexOf('table=tl_form_field')!=-1) {
        isContent = true;
        $$('body').addClass('fs_content');
        $$('.tl_listing_container').each(function (el) {
            if (el.getElements('ul>li>div').get('data-size')) {
                el.addClass('cte');
            }
        });
        $$('.tl_listing_container:not(#tl_select)>ul>li').each(function (el) {
            if (el.getElements('.sizes').get('data-size')) {
                var elcl = el.get('class');
                if (!elcl) {
                    elcl = '';
                }
                var colcl = el.getElements('.sizes').get('data-size');
                if(!colcl[0]){
                    colcl = ' col-xxs-12';
                }
                el.set('class', elcl + colcl);
                var row = new Element('div');
                row.set('class', 'row');
                var wraplimit = 0;
                var stopper = false;
                if (el.getChildren()[0].hasClass('wrapper_start')) {
                    wrappers.push(el);
                    wraplimit++;
                }
                else if (el.getChildren()[0].hasClass('wrapper_stop')) {
                    if(wrappers[wrappers.length - 1 - wraplimit]&&wrappers[wrappers.length - 1 - wraplimit].length!=0) {
                        el.inject(wrappers[wrappers.length - 1 - wraplimit].getChildren()[0], 'bottom');
                        wrappers.splice(wrappers.length - 1, 1);
                    }
                    else{
                        el.addClass('no_starter');
                    }
                    stopper = true;
                }
                if (wrappers.length > wraplimit && !stopper) {
                    if(wrappers[wrappers.length - 1 - wraplimit]&&wrappers[wrappers.length - 1 - wraplimit].length!=0) {
                        el.inject(wrappers[wrappers.length - 1 - wraplimit].getChildren()[0], 'bottom');
                    }
                    else{
                        el.addClass('no_starter');
                    }
                }
                row.wraps(el.getChildren()[0]);
            }
        });
        $$('.tl_content_right').each(function (el) {
            var inner = new Element('div');
            inner.set('class','inner');
            el.getChildren().each(function(child){
                inner.wraps(child);
            });
        });
        checkButtons();
    }
    if($$('#ctrl_fs_responsive').length!=0){

    }
});
window.addEvent('resize', function() {
    if(isContent) {
        checkButtons();
    }
});
function checkButtons(){
    $$('.tl_content_right .inner').each(function (el) {
        el.getParent().removeClass('collapsed');
        el.setStyle('white-space', 'nowrap');
        if (el.getSize().x > (el.getParent().getSize().x - parseInt(el.getParent().getStyle('padding').split(' ')[1].split('px')[0]) - parseInt(el.getParent().getStyle('padding').split(' ')[3].split('px')[0]))) {
            el.getParent().addClass('collapsed');
        }
        el.setStyle('white-space', '');
    });
}
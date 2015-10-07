<script>
 
(function(){
 
        // ��ȡ����
 
        var $ = function (id){
 
                return document.getElementById(id);
 
        };
 

        // ����
 
        var each = function(a, b) {
 
                for (var i = 0, len = a.length; i < len; i++) b(a[i], i);
 
        };
 

        // �¼���
 
        var bind = function (obj, type, fn) {
 
                if (obj.attachEvent) {
 
                        obj['e' + type + fn] = fn;
 
                        obj[type + fn] = function(){obj['e' + type + fn](window.event);}
 
                        obj.attachEvent('on' + type, obj[type + fn]);
 
                } else {
 
                        obj.addEventListener(type, fn, false);
 
                };
 
        };
 
        
        // �Ƴ��¼�
 
        var unbind = function (obj, type, fn) {
 
                if (obj.detachEvent) {
 
                        try {
 
                                obj.detachEvent('on' + type, obj[type + fn]);
 
                                obj[type + fn] = null;
 
                        } catch(_) {};
 
                } else {
 
                        obj.removeEventListener(type, fn, false);
 
                };
 
        };
 
        
        // ��ֹ�����Ĭ����Ϊ
 
        var stopDefault = function(e){
 
                e.preventDefault ? e.preventDefault() : e.returnValue = false;
 
        };
 

        // ��ȡҳ�������λ��
 
        var getPage = function(){
 
                var dd = document.documentElement,
 
                        db = document.body;
 
                return {
 
                        left: Math.max(dd.scrollLeft, db.scrollLeft),
 
                        top: Math.max(dd.scrollTop, db.scrollTop)
 
                };
 
        };
 
        
        // ����
 
        var lock = {
 
                show: function(){
 
                        $('pageOverlay').style.visibility = 'visible';
 

                        var p = getPage(),
 
                                left = p.left,
 
                                top = p.top;
 
                        
                        // ҳ������������
 
                        this.mouse = function(evt){
 
                                var e = evt || window.event;
 
                                stopDefault(e);
 
                                scroll(left, top);
 
                        };
 

                        each(['DOMMouseScroll', 'mousewheel', 'scroll', 'contextmenu'], function(o, i) {
 
                                        bind(document, o, lock.mouse);
 
                        });
 

                        // �����ض�����: F5, Ctrl + R, Ctrl + A, Tab, Up, Down
 
                        this.key = function(evt){
 
                                var e = evt || window.event,
 
                                        key = e.keyCode;
 

                                if((key == 116) || (e.ctrlKey && key == 82) || (e.ctrlKey && key == 65) || (key == 9) || (key == 38) || (key == 40)) {
 
                                        try{
 
                                                e.keyCode = 0;
 
                                        }catch(_){};
 
                                        stopDefault(e);
 
                                };
 
                        };
 
                        bind(document, 'keydown', lock.key);
 
                },
 

                close: function(){
 
                        $('pageOverlay').style.visibility = 'hidden';
 

                        each(['DOMMouseScroll', 'mousewheel', 'scroll', 'contextmenu'], function(o, i) {
 
                                unbind(document, o, lock.mouse);
 
                        });
 

                        unbind(document, 'keydown', lock.key);
 
                }
 
        };
 

        bind(window, 'load', function(){
 
                $('btn_lock').onclick = function(){
 
                        lock.show();
 
                };
 

                $('pageOverlay').onclick = function(){
 
                        lock.close();
 
                };
 
        });
 

})();
 
</script>
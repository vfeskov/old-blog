vfwysiwig=function(){};
vfwysiwig.wrap = function(openingTag,closingTag){
    var textarea = jQuery(this).closest('.textarea-wrapper').find('textarea')[0];
    var selection = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    var beforeSelection = textarea.value.substring(0,textarea.selectionStart);
    var afterSelection = textarea.value.substring(textarea.selectionEnd);
    selection = selection.replace(/</g,'&lt;').replace(/>/g,'&gt;');
    textarea.value = beforeSelection + openingTag + selection + closingTag + afterSelection;
}
vfwysiwig.wrapCode = function(){
    var lang = jQuery(this).closest('.textarea-wrapper').find('.wrap-code-lang').val();
    vfwysiwig.wrap.call(this,'<pre><code class="'+lang+'">','</code></pre>');
}
vfwysiwig.wrapWithTag = function(){
    var tag = jQuery(this).closest('.textarea-wrapper').find('.wrap-with-tag-tag').val();
    vfwysiwig.wrap.call(this,'<'+tag+'>','</'+tag+'>');
}
jQuery(function(){
    if(jQuery('textarea.with-html').length){
        jQuery('textarea.with-html').wrap('<div class="textarea-wrapper" />');
        var html = '<a class="wrap-code" onclick="vfwysiwig.wrapCode.call(this);return false;" href="#">Wrap code</a>&nbsp;<select class="wrap-code-lang" onchange="jQuery(this).closest(\'.textarea-wrapper\').find(\'textarea\').focus()">';
        var langs = ["php","xml","javascript","css","json","python","profile","ruby","perl","scala","go","markdown","django","coffeescript","actionscript","vbscript","http","lua","applescript","delphi","java","cpp","objectivec","vala","cs","d","rsl","rib","mel","glsl","sql","smalltalk","lisp","clojure","ini","apache","nginx","diff","dos","bash","cmake","axapta","1c","avrasm","vhdl","parser3","tex","brainfuck","haskell","erlang","erlang-repl","rust","matlab","r"];
        for(var i=0;i<langs.length;i++)html+='<option>'+langs[i]+'</option>';
        html += '</select><br />';
        html += '<a class="wrap-with-tag" onclick="vfwysiwig.wrapWithTag.call(this);return false;" href="#">Wrap with tag</a>&nbsp;<select class="wrap-with-tag-tag">';
        var tags = ['p','h1','h2','h3','h4','strong','em'];
        for(var i=0;i<tags.length;i++)html+='<option>'+tags[i]+'</option>';
        html += '</select>';
        jQuery('textarea.with-html').before(html);
    }
});

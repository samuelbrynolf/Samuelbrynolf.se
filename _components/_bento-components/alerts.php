<section class="m-components row">
	<h2 class="a-small a-small components__title">Alerts: Build custom js-functions to trig alerts, or match <code>data-alert-target=""</code> with the target's ID. / Bento-jQuery-plugin: <code>alerttrigger();</code></h2>
	<a class="a-btn inline js-openalert" data-alert-target="#alert-1" href="#" rel="nofollow">Trigger alert with warning-style</a>
	<a class="a-btn inline js-openalert" data-alert-target="#alert-2" href="#" rel="nofollow">Trigger alert with default style</a>
	<a class="a-btn inline js-openalert" data-alert-target="#alert-3" href="#" rel="nofollow">Trigger alert with confirmation / ok-style</a>

    <!-- Alert content (below) could be placed anywhere in the dom -->

    <div id="alert-1" class="m-alert warning">
        <p>Warning!</p>
    </div>

    <div id="alert-2" class="m-alert">
        <p>Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor. Nulla facilisi. Duis aliquet egestas.</p>
    </div>

    <div id="alert-3" class="m-alert ok">
        <p>Check! Good work! Internet still intact!</p>
    </div>

</section>
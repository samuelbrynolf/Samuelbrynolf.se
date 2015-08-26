<section class="m-components">
	<h2 class="a-components__sectiontitle">Modal windows: Match <code>data-modaltarget=""</code> with <code>.o-modal</code> ID</h2>
	<a class="a-btn inline js-openmodal" data-modaltarget="#modal-1" href="#" rel="nofollow">Open an error modal window</a>
	<a class="a-btn inline js-openmodal" data-modaltarget="#modal-2" href="#" rel="nofollow">Open a default window</a>
	<a class="a-btn inline js-openmodal" data-modaltarget="#modal-3" href="#" rel="nofollow">Open a good-job window</a>
</section>

<div id="modal-1" class="o-modal">
	<div class="m-modal__popup warning">
		<button class="a-modal__btn js-closemodal">Close</button>
		<p>Oops! Don't do that! -styled modal</p>
	</div>
</div>

<div id="modal-2" class="o-modal">
	<div class="m-modal__popup">
		<button class="a-modal__btn js-closemodal">Close</button>
		<p>Default styled modal.</p>
	</div>
</div>

<div id="modal-3" class="o-modal">
	<div class="m-modal__popup ok">
		<button class="a-modal__btn js-closemodal">Close</button>
		<p>Good-job!-styled modal.</p>
	</div>
</div>
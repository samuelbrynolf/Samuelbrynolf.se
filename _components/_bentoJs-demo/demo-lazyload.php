<h2 class="a-components__sectiontitle">Lazyload images and srcset-images using <code>.lazyload</code></h2>

<section class="m-components">

		<img src="http://placehold.it/300x300"
			data-srcset="
				http://placehold.it/1800x750 1800w,
				http://placehold.it/1400x600 1400w,
				http://placehold.it/700x300 700w,
				http://placehold.it/500x200 500w"
     	sizes="
     		(min-width: 1400px) 100vw, 
     		(min-width: 700px) 50vw,
     		100vw"
     	alt="flexible image" class="lazyload" />
     	
</section>

<section class="m-components">
	<img
	alt="100%x200"
	src="http://placehold.it/100x75"
	data-src="http://placehold.it/1200x750"
	class="lazyload" />
</section>
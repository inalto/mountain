<div
            x-data="{
                init () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('loadMore')
                            }
                        })
                    }, {
                        root: null
                    });
                    observer.observe(this.$el);
                }
            }"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-4"
        >

  <div id="scrollTrigger" x-ref="scrollTrigger"></div>
</div>

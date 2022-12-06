@if($collection->hasMorePages())
    <div x-data="{
                                observe () {
                                    let observer = new IntersectionObserver((entries) => {
                                        entries.forEach(entry => {
                                            if (entry.isIntersecting) {
                                                @this.call('{{$loadMethod}}')
                                            }
                                        })
                                    }, {
                                        root: null
                                    })
                                    observer.observe(this.$el)
                                }
                            }"
         x-init="observe">
        @include('shared._loading')
    </div>
@endif

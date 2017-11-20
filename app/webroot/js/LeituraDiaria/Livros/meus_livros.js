var portfolioLoadMore = {

    pages: 0,
    currentPage: 1,
    $wrapper: $('#portfolioLoadMoreWrapper'),
    $btn: $('#portfolioLoadMore'),
    $loader: $('#portfolioLoadMoreLoader'),

    build: function() {

        var self = this;

        self.pages = self.$wrapper.data('total-pages');

        if(self.pages <= 1) {

            self.$btn.remove();
            return;

        } else {

            self.$btn.on('click', function() {
                self.loadMore();
            });

            // Infinite Scroll
            if(self.$btn.hasClass('btn-portfolio-infinite-scroll')) {
                self.$btn.appear(function() {
                    self.$btn.trigger('click');
                }, {
                    data: undefined,
                    one: false,
                    accX: 0,
                    accY: 0
                });
            }

        }

    },
    loadMore: function() {

        var self = this;

        self.$btn.hide();
        self.$loader.show();

        // Ajax
        $.ajax({
            url: baseUrl + 'Livros/carregar_livros_ajax.json',
            data: montarDataRecarregar(),
            complete: function(data) {
                var $items = $(data.responseText);

                setTimeout(function() {

                    self.$wrapper.append($items);

                    self.$wrapper.isotope('appended', $items);

                    self.currentPage++;

                    if(self.currentPage < self.pages) {
                        self.$btn.show().blur();
                    } else {
                        self.$btn.remove();
                    }

                    // Carousel
                    $(function() {
                        $('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').each(function() {
                            var $this = $(this),
                                opts;

                            var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
                            if (pluginOptions)
                                opts = pluginOptions;

                            $this.themePluginCarousel(opts);
                        });
                    });

                    self.$loader.hide();

                }, 1000);

            }
        });

    }

};

if($('#portfolioLoadMoreWrapper').get(0)) {
    portfolioLoadMore.build();
}

function montarDataRecarregar() {
    return {
        'ultimoId': buscarUltimoId()
    };
}

function buscarUltimoId() {
    return $('#portfolioLoadMoreWrapper>li.livro:last').attr('data-id');
}
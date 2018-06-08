function determineOverflow(content, container) {
    // console.log(container);
    let containerMetrics = container[0].getBoundingClientRect();
    let containerMetricsRight = Math.floor(containerMetrics.right);
    let containerMetricsLeft = Math.floor(containerMetrics.left);
    let contentMetrics = content[0].getBoundingClientRect();
    let contentMetricsRight = Math.floor(contentMetrics.right);
    let contentMetricsLeft = Math.floor(contentMetrics.left);
    // console.log(containerMetricsLeft, contentMetricsLeft, containerMetricsRight, contentMetricsRight);
    if (containerMetricsLeft > contentMetricsLeft && containerMetricsRight < contentMetricsRight) {
        return 'both';
    } else if (contentMetricsLeft < containerMetricsLeft) {
        return 'left';
    } else if (contentMetricsRight > containerMetricsRight) {
        return 'right';
    } else {
        return 'none';
    }
}

const MAIN = {};

MAIN.init = function () {
    let product_nav = $('.pn-ProductNav');
    let product_scroll = $('.pn-ProductNav-scroll');
    // console.log(product_nav);
    product_nav.each(function () {
        let that = $(this);

        let product_nav_content = that.find('.pn-ProductNav_Contents');
        let width = 0;
        product_nav_content.find('.tab').each(function () {
            width += $(this).width();
        });
        width = Math.max(that.width(), width);
        product_nav_content.width(width + 'px');

        that.attr('data-overflowing', determineOverflow(product_nav_content, that));

        let pos = 0;
        $('.pn-Advancer_Right').on('click', function () {
            pos += 1;
            product_scroll.scrollLeft(pos * 100);
            that.attr('data-overflowing', determineOverflow(product_nav_content, that));
            // console.log(pos);
        });
        $('.pn-Advancer_Left').on('click', function () {
            pos = pos > 0 ? pos - 1 : 0;
            product_scroll.scrollLeft(pos * 100);
            that.attr('data-overflowing', determineOverflow(product_nav_content, that));
            // console.log(pos);
        });
    });
};

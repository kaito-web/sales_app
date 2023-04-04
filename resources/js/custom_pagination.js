$(document).ready(function () {
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchCompanyList(page);
    });

    function fetchCompanyList(page) {
        $.ajax({
            url: '/fetch-company-list?page=' + page,
            success: function (data) {
                $('#company-list').html(data);
            }
        });
    }
});

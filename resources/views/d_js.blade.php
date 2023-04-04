{{-- <script>
    $(document).ready(function() {
        // ローカルストレージから選択された会社のIDを取得
        let selectedCompanyIds = JSON.parse(localStorage.getItem('selectedCompanyIds')) || [];

        // ページ読み込み時にチェックボックスの状態を復元
        selectedCompanyIds.forEach(function(companyId) {
            $('#company_' + companyId).prop('checked', true);
        });

        // チェックボックスがクリックされた時のイベント
        $(document).on('click', '.form-check-input', function(event) {
            var companyId = $(this).val();

            if ($(this).is(':checked')) {
                // チェックされたら、選択された会社のIDを追加
                selectedCompanyIds.push(companyId);
            } else {
                // チェックが外されたら、選択された会社のIDを削除
                selectedCompanyIds = selectedCompanyIds.filter(function(id) {
                    return id !== companyId;
                });
            }

            // ローカルストレージに選択された会社のIDを保存
            localStorage.setItem('selectedCompanyIds', JSON.stringify(selectedCompanyIds));
        });
    });
    $('form').on('submit', function(event) {
        // Get the array of selected company ids from local storage
        let selectedCompanyIds = JSON.parse(localStorage.getItem('selectedCompanyIds')) || [];

        // Set the hidden input field value to the selected company ids
        $('#selected_company_ids').val(selectedCompanyIds.join(','));
    });
</script> --}}


<style>
    .company-container {
        display: flex;
        flex-wrap: wrap;
    }

    .form-check {
        width: 50%;
    }
</style>

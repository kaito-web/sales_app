<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //押したときlike-btnが入ったとき
        function updateLikeButtons(likedCompanyIds) {
            $('.like-btn').each(function() {
                const companyId = $(this).data('id');
                if (likedCompanyIds.includes(companyId)) {
                    $(this).css('color', 'blue');
                    $(this).addClass('liked');
                }
            });
        }

        $(document).ready(function() {
            // ページ読み込み時にいいねボタンの状態を更新
            const likedCompanyIds = {!! json_encode($likedCompanyIds) !!};
            updateLikeButtons(likedCompanyIds);

            $('.like-btn').click(function() {
                const companyId = $(this).data('id');
                const button = $(this);
                const countElement = $(`.like-count[data-company-id=${companyId}]`);

                if (button.hasClass('liked')) {
                    // 「いいね」を削除する
                    $.ajax({
                        url: "{{ route('dislike') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "company_id": companyId
                        },
                        success: function(data) {
                            // ここに成功時の処理を追加します。
                            button.removeClass('liked');
                            button.css('color', '');

                            // いいねのカウントを更新します。
                            countElement.text(data.likes_count);
                        },
                        error: function() {
                            // ここに失敗時の処理を追加します。
                            console.log('fail');
                        }
                    });
                } else {
                    // 「いいね」を追加する
                    $.ajax({
                        url: "{{ route('like') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "company_id": companyId
                        },
                        success: function(data) {
                            // ここに成功時の処理を追加します。
                            button.addClass('liked');
                            button.css('color', 'blue');

                            // いいねのカウントを更新します。
                            countElement.text(data.likes_count);
                        },
                        error: function() {
                            //ここに失敗時の処理を追加します。
                            console.log('fail');
                        }
                    });
                }
            });
        });
    </script>
</head>

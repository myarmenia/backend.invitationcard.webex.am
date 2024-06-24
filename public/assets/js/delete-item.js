$(function () {
  $('.click_delete_item').on('click', function () {
    let id = $(this).parents('.action').attr('data-id')
    let tb_name = $(this).parents('.action').attr('data-tb-name')
    let url = `/delete-item/${tb_name}/${id}`

    $('.delete_item').attr('data-url', url)
    $('.message_cont').html('')

  })
})


$(function () {
  $('.delete_item').on('click', function () {
    let url = $(this).attr('data-url')
    let id = url.split("/").pop();
    let row = $(`.action[data-id="${id}"]`).parents('tr')
    let image_div = $(this).parent('.uploaded-image-div')
    let image_divs = $('.uploaded-image-div')
    console.log(image_div)
    if ((image_divs.length > 1 && row.length == 0) || (image_divs.length == 0 && row.length > 0)) {
      $.ajax({
        type: "GET",
        url: url,
        cache: false,
        success: function (data) {
          let message = ''
          let type = ''
            console.log(data, 445566)
          if (data.result) {
              if (data.result == 'hasRelation'){
                  message = 'У объекта есть связь'
                  type = 'danger'
              }
              else{
                  message = 'Действие подтверждено.'
                  type = 'success'
                  row.remove()
                  image_div.remove()

              }

          }
          else {
              message = 'Произошла ошибка.'
            type = 'danger'
          }

          $('.message_cont').html(`<span class="text-${type}">${message}</span>`)
        }
      });
    }
  })
})

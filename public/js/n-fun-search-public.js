;(function ($) {
  'use strict'

  $(document).ready(function () {
    // Search form

    $('#nsfForm').submit(function (e) {
      e.preventDefault()

      const searchInput = $('#nsfSearchInput').val()

      const baseApiUrl = 'https://rickandmortyapi.com/api/character'

      const settings = {
        url: baseApiUrl + '?name=' + searchInput,
        method: 'GET',
        timeout: 0,
      }

      $.ajax(settings)
        .done(function (data) {
          $('.nsf-results').html('')
          if (data.results.length === 0) {
            $('.nsf-results').append('<p>No results found</p>')
            return
          }

          let html = '<ul class="nsf-ch-list-grid">'

          data.results.forEach(function (result) {
            html += '<li class="nsf-ch-card">'
            html += '<img src="' + result.image + '" alt="' + result.name + '">'
            html += '<div class="nsf-card-content" >'
            html += '<h3>' + result.name + '</h3>'
            html += '<p>Status: ' + result.status + '</p>'
            html += '<p>Species: ' + result.species + '</p>'
            html += '</div>'
            html += '</li>'
          })

          html += '</ul>'
          $('.nsf-results').append(html)
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          // Handle errors here
          console.error('AJAX Error:', textStatus, errorThrown)
          $('.nsf-results').html('<p>Error fetching characters!</p>')
        })
    })
  })
})(jQuery)

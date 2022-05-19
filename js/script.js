$(document).ready(function () {
  $('#sub_region').css('display', 'none')
  $('#sub_raion').css('display', 'none')

  $('#get_federal').change(function () {
    clearlist()
    $('#sub_raion').css('display', 'none')
    var federalvalue = $('#get_federal option:selected').val()
    if (federalvalue === '') {
      clearlist()
      $('#sub_region').css('display', 'none')
    }
    getarea()
  })

  function getarea() {
    var federal_value = $('#get_federal option:selected').val()
    var area = $('#get_region')
    //var getarea_value = area.val()
    if (federal_value === '') {
      area.attr('disabled', true)
    } else {
      area.attr('disabled', false)
      area.load('get_region.php', { federal_district: federal_value })
      $('#sub_region').css('display', 'block')
    }

    $('#get_region').change(function () {
      getraion()
    })
  }

  function getraion() {
    var region_value = $('#get_region option:selected').val()
    if (region_value == undefined) {
      var region_value = $('#id_region').val()
    }
    var area = $('#get_raion')
    if (region_value === '') {
      area.attr('disabled', true)
      $('#sub_raion').css('display', 'none')
      $('#get_raion').empty()
    } else {
      area.attr('disabled', false)
      area.load('get_raion.php', { region: region_value })
      $('#sub_raion').css('display', 'block')
    }
  }

  function clearlist() {
    $('#get_region').empty()
    $('#get_raion').empty()
  }
})

// var options = {
//   chart: {
//     type: 'bar',
//   },
//   series: [
//     {
//       name: 'sales',
//       data: [30, 40, 45, 50, 49, 60, 70, 91, 125],
//     },
//   ],
//   xaxis: {
//     categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
//   },
// }

// var chart = new ApexCharts(document.querySelector('#chart'), options)

// chart.render()

$(function () {

  const url = "/zay/data/ajax/community_ajax.php";

  $.get(url, { page: 1 }, function (comm_data) {
    $('.comm_row').append(comm_data);
  });


});

let current = 1;
const pgLength = $(".num").length;

function getPage(n) {
  const url = "/zay/data/ajax/community_ajax.php";
  $(".num").removeClass("active");
  $(".num").eq(n - 1).addClass("active");

  $.get(url, { page: n }, function (comm_data) {
    $('.comm_row').html(comm_data);
    current = n;
  });

};

function prevNext(pageNum, calcPage) {
  if (current == pageNum) {
    getPage(pageNum);
  } else {
    getPage(current + calcPage);
  }
}

$(".angle").click(function () {
  if ($(this).hasClass("prev")) {
    prevNext(1, -1);
  } else {
    prevNext(pgLength, 1);
  }
});

$(".angle_double").click(function () {
  if ($(this).hasClass("first")) {
    getPage(1);
  } else {
    getPage(pgLength);
  }
});

// $(".next").click(function () {
//   prevNext(pgLength, 1);
// });

// $(".prev").click(function () {
//   prevNext(1, -1);
//   // if (current == 1) {
//   //   getPage(1);
//   // } else {
//   //   getPage(current - 1);
//   // }
// });


$(".num").eq(0).addClass("active");
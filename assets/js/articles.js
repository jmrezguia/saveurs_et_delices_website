<<<<<<< HEAD

=======
>>>>>>> 2a5e71f (add all files from walid)
$(document).ready(function () {

  // CREATE ARTICLE
  $("#createArticleForm").on("submit", function (e) {
    e.preventDefault();

    let form = document.getElementById("createArticleForm");
    let formData = new FormData(form);

    formData.append("action", "create");

    $.ajax({
      url: "/SAVEURS_ET_DELICES/ajax/articles.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,

      success: function (response) {
        if (typeof response === "string") {
          response = JSON.parse(response);
        }

        alert(response.message);

        if (response.success) {
          window.location.href = "/SAVEURS_ET_DELICES/admin/Dashboard.php";
        }
      },

      error: function (xhr) {
        console.log(xhr.responseText);
        alert("Erreur AJAX lors de l'ajout");
      }
    });
  });


  // UPDATE ARTICLE
  $("#editArticleForm").on("submit", function (e) {
    e.preventDefault();

    let form = document.getElementById("editArticleForm");
    let formData = new FormData(form);

    formData.append("action", "update");

    $.ajax({
      url: "/SAVEURS_ET_DELICES/ajax/articles.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,

      success: function (response) {
        if (typeof response === "string") {
          response = JSON.parse(response);
        }

        alert(response.message);

        if (response.success) {
          window.location.href = "/SAVEURS_ET_DELICES/admin/Dashboard.php";
        }
      },

      error: function (xhr) {
        console.log(xhr.responseText);
        alert("Erreur AJAX lors de la modification");
      }
    });
  });


  // DELETE ARTICLE
  $(document).on("click", ".deleteArticleBtn", function () {
    const id = $(this).data("id");

    if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
      $.ajax({
        url: "/SAVEURS_ET_DELICES/ajax/articles.php",
        type: "POST",
        data: {
          action: "delete",
          id: id
        },
        dataType: "json",

        success: function (response) {
          alert(response.message);

          if (response.success) {
            location.reload();
          }
        },

        error: function () {
          alert("Erreur AJAX lors de la suppression");
        }
      });
    }
  });


  // ANNULER
  $(".btn-cancel").on("click", function () {
    window.location.href = "/SAVEURS_ET_DELICES/admin/Dashboard.php";
  });


  // AJOUTER TAG
  

let tagsArray = [];

$(".btn-tag").on("click", function () {

  const input = $("#tagInput");

  const value = input.val().trim();

  if (value === "") {

    alert("Veuillez saisir un tag");

    return;
  }

  tagsArray.push(value);

  $("#tagsHidden").val(tagsArray.join(","));

  $(".tags-list").append(`
    <span class="tag-item" data-tag="${value}">
      ${value}
      <i class="fa-solid fa-xmark remove-tag"></i>
    </span>
  `);

  input.val("");

});

$(document).on("click", ".remove-tag", function () {

  const tag = $(this).parent().data("tag");

  tagsArray = tagsArray.filter(item => item !== tag);

  $("#tagsHidden").val(tagsArray.join(","));

  $(this).parent().remove();

});


  // SUPPRIMER TAG VISUELLEMENT
  $(document).on("click", ".remove-tag", function () {
    $(this).closest(".tag-item").remove();
  });

});
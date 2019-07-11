$('.logout').on('click', function () {
    Swal.fire({
        title: 'Are you sure?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout'
    }).then(function (result) {
        if (result.value) {
            window.location = window.location.origin + "/SiUjianTemp/auth/logout";
        }
    })
});

// $('.userdelete').on('click', function () {
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Delete'
//     }).then(function (result) {
//         if (result.value) {
//             // window.location = window.location.origin + "/SiUjianTemp/auth/logout";
//             Swal.fire({
//                 title: 'Delete Success',
//                 text: 'User has been deleted',
//                 type: 'success'
//             });
//         }
//     })
// });
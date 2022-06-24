function gotoDetail(id) {
    const {origin} = window.location;
    location.href = `${origin}/admin/vehicle/${id}`;
}
let sendEnquiryBtn = document.querySelector('#sendEnquiryBtn')
sendEnquiryBtn.addEventListener('click', ()=> {
    let gradeId = document.querySelector('#sendEnquiryBtn > input[name=gradeId]').value
    let type = 'predefined'
    let url = location.origin + '/projects/whiteboard/enquiry-form/' + gradeId + '/' + 0 + '/' + type 
    window.location.href = url
})
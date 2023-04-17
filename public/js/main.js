window.addEventListener("DOMContentLoaded", () => {
    let commentStarted = false;
    let deletedCommentsCount = 0;
  
    const commentBox = document.getElementById("content");
    const user_id = commentBox.dataset.userId;

    if (!commentBox) {
      console.error("Element with ID 'content' not found.");
      return;
    }
  
    commentBox.addEventListener("input", () => {
      if (!commentStarted && commentBox.value.length > 0) {
        commentStarted = true;
      }
    });
  
    commentBox.addEventListener("blur", () => {
      if (commentStarted && commentBox.value.length === 0) {
        deletedCommentsCount++;
        console.log("Deleted comments: ", deletedCommentsCount);
  
        fetch('/deleted-comments', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            user_id: user_id,
            deleted_comments: deletedCommentsCount
          })
        })
          .then(response => response.json())
          .then(data => console.log(data))
          .catch(error => console.error(error));
      }
      commentStarted = false;
    });
  });
  
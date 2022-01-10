<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pezesha Interview Test</title>
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script src="https://unpkg.com/vue@3"></script>
    
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const app = {
            data(){
                return {
                    progress: 'Welcome to progress page',
                    progressTitle: 'Progress of uploads',
                    progressPercentage: 0,
                    params: {
                        id: null
                    }
                }
            },
            methods: {
                checkIfIdPresent(){
                    const urlSearchParams = new URLSearchParams(window.location.search);
                    const params = Object.fromEntries(urlSearchParams.entries());
                    if(params.id){
                        this.params.id = params.id;
                    }
                },
                getUploadProgress(){
                    let self = this;
                  self.checkIfIdPresent();
                  console.log(self.params.id, "<?php echo e(session()->get('lastBatchId')); ?>");
                  //get progress data
                  let progressResponse = setInterval(() => {
                      axios.get('/progress/data',{
                          params: {
                              id: self.params.id ? self.params.id : "<?php echo e(session()->get('lastBatchId')); ?>"
                          }
                      })
                      .then((response) => {
                          console.log(response.data);
                          let totalJobs = parseInt(response.data.total_jobs);
                          let pendingJobs = parseInt(response.data.pending_jobs);
                          let completedJobs = totalJobs - pendingJobs;

                          if(pendingJobs == 0){
                              self.progressPercentage = 100;
                          }else{
                              self.progressPercentage = parseInt(completedJobs/totalJobs * 100).toFixed(0);
                          }

                          if (parseInt(self.progressPercentage) >= 100) {
                              clearInterval(progressResponse);
                          } 
                      }).catch();
                  }, 1000);
                }
            },
            created(){
                this.getUploadProgress();
            }
        }
        Vue.createApp(app).mount("#app");
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pezesha\resources\views/layouts/app.blade.php ENDPATH**/ ?>
<template>
<div>
	<span :class="label">{{value}}%</span>		
</div>
</template>

<script>
export default {
	props: ['value'],
    data(){
        return{
        }
    }, 
    computed: {
        label: function () {
        	if (this.value > 80) {
        		return 'label label-danger';
        	} else if (this.value > 50) {
        		return 'label label-warning';
        	} else {
        		return 'label label-success';
        	}
        },
    }      
}
</script>

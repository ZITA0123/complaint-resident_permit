<template>
    <div id="app">
        <h2>RDV</h2>
        <calendar-view
            :show-date="showDate"
            :enableDateSelection="true"
            
            class="theme-default holiday-us-traditional holiday-us-official">
            <calendar-view-header
                slot="header"
                slot-scope="t"
                
                :header-props="t.headerProps"
                @input="setShowDate" />
        </calendar-view>
    </div>
</template>
<script>
    import { CalendarView, CalendarViewHeader } from "vue-simple-calendar"
    require("vue-simple-calendar/static/css/default.css")
    require("vue-simple-calendar/static/css/holidays-us.css")
 
    export default {
        name: 'app',
        data: function() {
            return { showDate: new Date() }
        },
        components: {
            CalendarView,
            CalendarViewHeader,
        },
        methods: {
            setShowDate(d) {
                this.showDate = d;
            },
        }
    }
</script>
<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        color: #2c3e50;
        height: 67vh;
        width: 90vw;
        margin-left: auto;
        margin-right: auto;
    }
</style>
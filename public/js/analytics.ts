import Chart from 'chart.js/auto';

// Define interfaces for page view data
interface PageView {
    total_views: number;
}

// Prepare the data for the chart
const todayPageViews: PageView[] = {!! json_encode($todayPageViews) !!} as PageView[];
const lastWeekPageViews: PageView[] = {!! json_encode($lastWeekPageViews) !!} as PageView[];
const lastMonthPageViews: PageView[] = {!! json_encode($lastMonthPageViews) !!} as PageView[];

// Get the canvas element and its context
const ctx = document.getElementById('pageViewsChart') as HTMLCanvasElement;
if (ctx) {
    const chart = new Chart(ctx.getContext('2d')!, {
        type: 'bar',
        data: {
            labels: ['Today', 'Last Week', 'Last Month'],
            datasets: [{
                label: 'Page Views',
                data: [
                    getTotalViews(todayPageViews),
                    getTotalViews(lastWeekPageViews),
                    getTotalViews(lastMonthPageViews)
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Helper function to calculate the total views for a given period
function getTotalViews(data: PageView[]): number {
    return data.reduce((total, item) => total + item.total_views, 0);
}

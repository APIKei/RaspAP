var options = {
    animate: true,
    acceptWidgets: true,
    staticGrid: true,
    disableOneColumnMode: true,
    dragIn: '.newWidget', // class that can be dragged from outside
    dragInOptions: { revert: 'invalid', scroll: false, appendTo: 'body', helper: 'clone' },
    removable: '#trash', // drag-out delete class
    removeTimeout: 100,
    column: 12,
    maxRow: 12,
    minRow: 1, // prevent grid from collapsing when empty
    alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    resizable: {
        handles: 'e, se, s, sw, w, n'
    }
};

var grid = GridStack.init(options);

// Save to LocalStorage
grid.on('change', function (event, items) {
    var saveContent = false;
    var serializedData = grid.save(saveContent);
    localStorage.setItem("grid-layout", JSON.stringify(serializedData, null, '  '));
});

// Load from LocalStorage
loadGrid = function() {
    if (serializedData = localStorage.getItem("grid-layout")) {
        grid.load(JSON.parse(serializedData)); // update widgets
    }
}

loadGrid();

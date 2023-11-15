const electron = require('electron', 'path', 'electron-notify')
// Module to control application life.

// require('electron-debug')({showDevTools: true});


//  require('electron').app

const app = electron.app


// const updater = require('electron-simple-updater');

// updater.init('https://www.laylacms.com/updates/index.php');

// updater.init({
//   checkUpdateOnStart: true,
//   autoDownload: true
// });

// app.setBadgeCount(app.getBadgeCount() + 1)

// Module to create native browser window.
const BrowserWindow = electron.BrowserWindow

const path = require('path')
const url = require('url')
const dialog = require('dialog')


// Keep a global reference of the window object, if you don't, the window will
// be closed automatically when the JavaScript object is garbage collected.
let mainWindow

function createWindow () {
  // Create the browser window.
  mainWindow = new BrowserWindow({show: true, minWidth: 1024, minHeight: 768, width: 1300, height: 800, 'transparent': true, modal: true, backgroundColor: '#2e2c29', background: 'url(layla.png)', titleBarStyle: 'hiddenInset', frame: false, icon: path.join(__dirname,'layla.png')})


  // and load the index.html of the app.
  mainWindow.loadURL(url.format({
    pathname: path.join(__dirname, 'index.html'),
    protocol: 'file:',
    slashes: true
  }))

  // Open the DevTools.
  // mainWindow.webContents.openDevTools()

  // Emitted when the window is closed.
  mainWindow.on('closed', function () {
    // Dereference the window object, usually you would store windows
    // in an array if your app supports multi windows, this is the time
    // when you should delete the corresponding element.
    mainWindow = null
  })
}





// This method will be called when Electron has finished
// initialization and is ready to create browser windows.
// Some APIs can only be used after this event occurs.
app.on('ready', function(){
        // Initiate the module

        createWindow();






        // updater.checkForUpdates();


 // updater.checkForUpdates();
 //  updater.on('update-downloaded', onUpdateDownloaded);

 //  updater.on('update-downloading', onUpdateDownloaded);



        // EBU.init({
        //     'api': 'https://www.laylacms.com' // The API EBU will talk to
        // });
    });

// Quit when all windows are closed.
app.on('window-all-closed', function () {
  // On OS X it is common for applications and their menu bar
  // to stay active until the user quits explicitly with Cmd + Q
  if (process.platform !== 'darwin') {
    app.quit()
  }
})

app.on('activate', function () {
  // On OS X it's common to re-create a window in the app when the
  // dock icon is clicked and there are no other windows open.
  if (mainWindow === null) {
    createWindow()
  }
})

// In this file you can include the rest of your app's specific main process
// code. You can also put them in separate files and require them here.



// function onUpdateAvailable(meta) {

//     document.body.className = 'update-available';
//   }



//   function onUpdateDownloading() {
//     alert('downloading update');
//   }

//   function onUpdateDownloaded() {
//     alert('updated');
//     if (window.confirm('The app has been updated. Do you like to restart it now?')) {
//       // updater.quitAndInstall();
//     }
//   }











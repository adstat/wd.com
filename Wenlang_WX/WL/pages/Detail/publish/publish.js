// pages/Detail/publish/publish.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    imgs: [],
    id: 0,
    id_id:0,
    tit_con: "国际邮轮",
    bg_img: "",
    flags: true,
    privacy: false
  },
  
  // 匿名
  btnPage: function (e) {
    var that = this;
    that.setData({
      privacy: !(that.data.privacy),
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  },

  select: function (e) {
    var that = this;
    that.setData({
      id: e.target.dataset.id,
      tit_con: e.target.dataset.tit,
    })
  },

  add:function(e){
  
  },

  chooseImage: function () {
    var that = this;
    wx.chooseImage({
      count: 1,
      success: function (res) {
        const tempFilePaths = res.tempFilePaths;
        wx.uploadFile({
          // url: that.data.host + 'User/User/uploadImg',
          filePath: tempFilePaths[0],
          name: 'file',
          success(res) {
            var result = JSON.parse(res.data);
            that.setData({
              img: result.img
            })
          }
        })
      }
    })
  },


  // 上传图片
  chooseImg: function (e) {
    var that = this;
    var imgs = this.data.imgs;
    if (imgs.length >= 3) {
      this.setData({
        lenMore: 1
      });
      setTimeout(function () {
        that.setData({
          lenMore: 0
        });
      }, 2500);
      return false;
    }
    wx.chooseImage({
      // count: 1, // 默认9
      sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
      sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
      success: function (res) {
        // 返回选定照片的本地文件路径列表，tempFilePath可以作为img标签的src属性显示图片
        var tempFilePaths = res.tempFilePaths;
        var imgs = that.data.imgs;
        // console.log(tempFilePaths + '----');
        for (var i = 0; i < tempFilePaths.length; i++) {
          if (imgs.length >= 3) {
            that.setData({
              imgs: imgs
            });
            return false;
          } else {
            imgs.push(tempFilePaths[i]);
          }
        }
        // console.log(imgs);
        that.setData({
          imgs: imgs
        });
      }
    });
  },
  // 删除图片
  deleteImg: function (e) {
    var imgs = this.data.imgs;
    var index = e.currentTarget.dataset.index;
    imgs.splice(index, 1);
    this.setData({
      imgs: imgs
    });
  },
  // 预览图片
  // previewImg: function (e) {
  //   //获取当前图片的下标
  //   var index = e.currentTarget.dataset.index;
  //   //所有图片
  //   var imgs = this.data.imgs;
  //   wx.previewImage({
  //     //当前显示图片
  //     current: imgs[index],
  //     //所有图片
  //     urls: imgs
  //   })
  // }
})
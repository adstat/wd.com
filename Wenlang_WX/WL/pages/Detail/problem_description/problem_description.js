// pages/Detail/problem_description/problem_description.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    id: 0,
    imgs: [],
    tit_con: "国际邮轮",
    // length: 0,
    maxTextLen: 40,
    textLen: 0
  },
  // length(e) {
  //   let length = e.detail.value.length
  //   console.log(length)
  //   this.setData({
  //     length: length
  //   })
  // },

  getWords(e) {
    let page = this;
    // 设置最大字符串长度(为-1时,则不限制)
    let maxTextLen = page.data.maxTextLen;
    // 文本长度
    let textLen = e.detail.value.length;
    page.setData({
      maxTextLen: maxTextLen,
      textLen: textLen
    });

  },
  /**
   * 
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
  // function wordStatic(input) {
  //   // 获取要显示已经输入字数文本框对象
  //   var content = document.getElementById('num');
  //   if(content && input) {
  //     // 获取输入框输入内容长度并更新到界面
  //     var value = input.value;
  //     // 将换行符不计算为单词数
  //     value = value.replace(/\n|\r/gi, "");
  //     // 更新计数
  //     content.innerText = value.length;
  //   }
  // },
})
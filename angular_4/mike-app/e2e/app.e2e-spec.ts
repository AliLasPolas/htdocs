import { MikeAppPage } from './app.po';

describe('mike-app App', () => {
  let page: MikeAppPage;

  beforeEach(() => {
    page = new MikeAppPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
